let FormValidator = {
    handleSubmit:(event) => {
        event.preventDefault();
        
        //envio de formulário
        let send = true;

        //ver se estão preenchidos corretamente
        let inputs = form.querySelectorAll('input');

        //linpando os erros
        FormValidator.clearErrors();

        for(let i=0;i<inputs.length;i++) {
            let input = inputs[i];

            let check = FormValidator.checkInput(input);
            
            //caso dê algum erro, exiba o erro.
            if (check !== true) {
                send = false;

                //exibindo o erro na tela
                FormValidator.showError(input, check);
            }
        }

        if (send) {
            form.submit();
        }
    },
    checkInput:(input) => {
        //pega o data-rules expecifico do input
        let rules = input.getAttribute('data-rules');
        if (rules !== null) {   
            rules = rules.split('|');

            for(let k in rules) {
                let rDetails = rules[k].split('=');
                switch(rDetails[0]) {
                    case 'required':
                        if (input.value == '') {
                            return 'Campo não pode estar vazio.';
                        }
                    break;
                    case 'min':
                        if (input.value.length < rDetails[1]) {
                            return 'Campo deve ter pelomentos '+rDetails[1]+' caracteres';
                        }
                    break;
                    case 'email':
                        if (input.value != '') {
                            let verify = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                            if (!verify.test(input.value.toLowerCase())) {
                                return 'O e-mail digitado não é válido!';
                            }
                        }
                    break;
                }
            }
        }
        return true;
    },
    showError:(input, error) => {
        //deixa a borda do input vermelha
        input.style.borderColor = '#FF0000';

        //elemento de mensagem na tela 
        let errorElement = document.createElement('div'); //div 
        errorElement.classList.add('error'); //criando uma class
        errorElement.innerHTML = error; //exibindo a mensagem de erro

        input.parentElement.insertBefore(errorElement, input.ElementSibling);
    },
    clearErrors:() => {

        let inputs = form.querySelectorAll('input');
        for(let i=0;i<inputs.length;i++) {
            inputs[i].style = ''; //remove todo style do input
        }


        let errorElements = document.querySelectorAll('.error');
        for(let i=0;i<errorElements.length;i++) {
            errorElements[i].remove();
        }
    }
}

let form = document.querySelector('.validator');
form.addEventListener('submit', FormValidator.handleSubmit);