import React, { useState, useEffect } from 'react';
import { connect } from 'react-redux';
import Alert from '../../../components/Alert';
import FormError from '../../../components/FormError';
import API from '../../../constant/API';

function CallToAction(props) {
    let { langPack } = props;

    const [lang, setLang] = useState({});

    const [showAlert, setShowAlert] = useState(false);
    const [alertVariant, setAlertVariant] = useState('default');
    const [alertText, setAlertText] = useState('');
    const [isLoaded, setIsLoaded] = useState(true);

    const [email, setEmail] = useState('');
    const [formError, setFormError] = useState('');
    const emailRegex =
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    useEffect(() => {
        langPack.lang ? setLang(langPack.lang) : null;
    }, [langPack]);

    const emailChangeHandler = (e) => {
        let value = e.target.value;

        setFormError('');
        let validationText = '';

        if (value.trim() == '') {
            validationText = lang.validation.required;
            setFormError(validationText.replace(':attribute', lang.email));
        }

        if (value.trim() != '' && emailRegex.test(String(value).toLowerCase()) === false) {
            validationText = lang.validation.custom.email.email;
            setFormError(validationText.replace(':attribute', lang.email));
        }

        if (
            value.trim() != '' &&
            emailRegex.test(String(value).toLowerCase()) === true &&
            String(value.trim()).length > 100
        ) {
            validationText = lang.validation.custom.email.max;
            setFormError(validationText.replace(':attribute', lang.email));
        }

        setEmail(value);
    };

    const sendMessageHandler = () => {
        setIsLoaded(false);

        Axios.post(API.message_cta, { email: email })
            .then((response) => {
                let responseBody = response.data;

                setIsLoaded(true);
                if (responseBody.status == 200) {
                    setShowAlert(true);
                    setAlertVariant('success');
                    setAlertText(responseBody.message);
                    setEmail('');
                }
            })
            .catch((error) => {
                let responseBody = error.response.data;

                setIsLoaded(true);
                setFormError('');

                if (responseBody.status == 400) {
                    setFormError(responseBody.message.email[0]);
                } else {
                    setShowAlert(true);
                    setAlertVariant('danger');
                    setAlertText(lang.something_went_wrong);
                }
            });
    };

    const closeAlertHandler = () => {
        setShowAlert(false);
    };

    return (
        <div className="xl:w-3/4 xl:mx-auto">
            <Alert variant={alertVariant} isShow={showAlert} closeHandler={closeAlertHandler}>
                {alertText}
            </Alert>
            <div className="flex row items-center justify-between lg:px-20 xl:px-0">
                <input
                    type="email"
                    className="w-full px-6 py-4 bg-white border border-solid border-ib-three rounded-md focus:outline-none md:text-lg"
                    placeholder={lang.your_email}
                    value={email}
                    onChange={emailChangeHandler}
                />
                {isLoaded ? (
                    <button
                        type="button"
                        className="w-3/4 lg:w-1/2 ml-4 py-4 px-6 bg-ib-three hover:bg-opacity-70 transition-all duration-500 border border-solid border-ib-three text-ib-four rounded-md focus:outline-none md:text-lg"
                        onClick={sendMessageHandler}
                    >
                        {lang.send_message}
                    </button>
                ) : (
                    <button
                        type="button"
                        className="w-3/4 lg:w-1/2 ml-4 py-4 px-6 bg-ib-three bg-opacity-50 transition-all duration-500 border border-solid border-ib-three text-ib-four rounded-md focus:outline-none md:text-lg"
                        onClick={sendMessageHandler}
                    >
                        {lang.loading}...
                    </button>
                )}
            </div>
            {formError ? <FormError>{formError}</FormError> : null}
        </div>
    );
}

const mapStateToProps = (state) => {
    return { langPack: state.lang };
};

export default connect(mapStateToProps)(CallToAction);
