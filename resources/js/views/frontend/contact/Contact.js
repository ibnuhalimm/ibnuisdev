import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom';
import FormLabel from '../../../components/FormLabel';
import FormError from '../../../components/FormError';
import InputText from '../../../components/Form/InputText';
import Alert from '../../../components/Alert';
import API from '../../../constant/API';

function Contact() {
    const [ isSent, setIsSent ] = useState(true);
    const [ forms, setForms ] = useState({});
    const [ errors, setErrors ] = useState({});

    const [ lang, setLang ] = useState({});

    const [ showAlert, setShowAlert ] = useState(false);
    const [ variantAlert, setVariantAlert ] = useState('default');
    const [ textAlert, setTextAlert ] = useState('');


    useEffect(() => {
        _getLangPack();
    }, []);


    const _getLangPack = () => {
        axios.get(API.lang_pack)
            .then(response => {
                let responseBody = response.data;
                let language = responseBody.data;

                setLang(language);
            });
    };


    const inputChangeHandler = (e) => {
        let { name, value } = e.target;

        setForms({
            ...forms,
            ...{[name]: value}
        });

        validateForm(name, value);
    };


    const validateForm = (fieldName, value) => {
        let validationText = '';
        let emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        switch (fieldName) {
            case 'name':
                errors.name = null;

                if (value.trim() == '') {
                    validationText = lang.validation.required;
                    errors.name = <FormError>{validationText.replace(':attribute', lang.name)}</FormError>;
                }

                if (value.trim() != '' && String(value.trim()).length < 5) {
                    validationText = lang.validation.custom.name.min;
                    errors.name = <FormError>{validationText.replace(':attribute', lang.name)}</FormError>;
                }

                if (value.trim() != '' && String(value.trim()).length > 40) {
                    validationText = lang.validation.custom.name.max;
                    errors.name = <FormError>{validationText.replace(':attribute', lang.name)}</FormError>;
                }

                break;

            case 'email':
                errors.email = null;

                if (value.trim() == '') {
                    validationText = lang.validation.required;
                    errors.email = <FormError>{validationText.replace(':attribute', 'Email')}</FormError>;
                }

                if (value.trim() != '' && emailRegex.test(String(value).toLowerCase()) === false) {
                    validationText = lang.validation.custom.email.email;
                    errors.email = <FormError>{validationText.replace(':attribute', 'Email')}</FormError>;
                }

                if (value.trim() != ''
                    && emailRegex.test(String(value).toLowerCase()) === true
                    && String(value.trim()).length > 100) {
                    validationText = lang.validation.custom.email.max;
                    errors.email = <FormError>{validationText.replace(':attribute', lang.email)}</FormError>;
                }
                break;

            case 'message':
                errors.message = null;

                if (value.trim() == '') {
                    validationText = lang.validation.required;
                    errors.message = <FormError>{validationText.replace(':attribute', lang.message)}</FormError>;
                }

                if (value.trim() != '' && value.trim().length < 50) {
                    validationText = lang.validation.custom.message.min;
                    errors.message = <FormError>{validationText.replace(':attribute', lang.message)}</FormError>;
                }
                break;

            default:
                break;
        }

        setErrors(errors);
    }


    const sendMessage = () => {
        setIsSent(false);
        setErrors({});

        axios.post(API.message, forms)
            .then(response => {
                let responseBody = response.data;

                setIsSent(true);
                window.scrollTo(0, 0);

                if (responseBody.status == 200) {
                    setShowAlert(true);
                    setVariantAlert('success');
                    setTextAlert(responseBody.message);
                    setForms({ name: '', email: '', message: '' });
                }
            })
            .catch(error => {
                let responseBody = error.response.data;

                setIsSent(true);
                window.scrollTo(0, 0);

                if (responseBody.status == 400) {
                    let allError = {};

                    if (responseBody.message.name !== undefined) {
                        allError = {
                            ...allError,
                            ...{ name: <FormError>{responseBody.message.name[0]}</FormError> }
                        };
                    }

                    if (responseBody.message.email !== undefined) {
                        allError = {
                            ...allError,
                            ...{ email: <FormError>{responseBody.message.email[0]}</FormError> }
                        };
                    }

                    if (responseBody.message.message !== undefined) {
                        allError = {
                            ...allError,
                            ...{ message: <FormError>{responseBody.message.message[0]}</FormError> }
                        };
                    }

                    setErrors(allError);
                }
                else {
                    setShowAlert(true);
                    setVariantAlert('danger');
                    setTextAlert(lang.something_went_wrong);
                }
            });
    };


    const alertCloseHandler = () => {
        setShowAlert(false);
    }


    return (
        <div className="w-full lg:w-3/4">
            <Alert isShow={showAlert} variant={variantAlert} closeHandler={alertCloseHandler}>
                {textAlert}
            </Alert>

            <div className="mb-6">
                <FormLabel fieldId="__nameContactMe" isRequired={true}>
                    {lang.your_name}
                </FormLabel>
                <InputText
                    type="text"
                    name="name"
                    id="__nameContactMe"
                    onChange={inputChangeHandler}
                    value={forms.name} />
                {errors.name}
            </div>
            <div className="mb-6">
                <FormLabel fieldId="__emailContactMe" isRequired={true}>
                    {lang.your_email}
                </FormLabel>
                <InputText
                    type="email"
                    name="email"
                    id="__emailContactMe"
                    onChange={inputChangeHandler}
                    value={forms.email} />
                {errors.email}
            </div>
            <div className="mb-6">
                <FormLabel fieldId="__messageContactMe" isRequired={true}>
                    {lang.message}
                </FormLabel>
                <textarea
                    name="message"
                    id="__messageContactMe"
                    className="w-full px-3 py-2 border border-solid border-gray-400 bg-white outline-none resize-none h-60 rounded-md"
                    onChange={inputChangeHandler}
                    value={forms.message} />
                {errors.message}
            </div>
            {isSent
                ?   <button
                        type="button"
                        className="py-2 px-6 bg-ib-three border border-solid border-ib-three text-ib-four outline-none focus:outline-none rounded-md hover:bg-opacity-70 transition-all duration-500"
                        onClick={sendMessage}>
                            {lang.send_message}
                    </button>
                :   <button
                        type="button"
                        className="py-2 px-6 bg-ib-three border border-solid border-ib-three text-ib-four outline-none focus:outline-none rounded-md bg-opacity-50 cursor-default">
                            {lang.loading}...
                    </button>
            }
        </div>
    );
}

export default Contact;

if (document.getElementById('contact-ui-content')) {
    ReactDOM.render(<Contact/>, document.getElementById('contact-ui-content'));
}