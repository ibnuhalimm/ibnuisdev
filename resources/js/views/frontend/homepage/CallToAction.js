import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import Alert from '../../../components/Alert';
import FormError from '../../../components/FormError';
import API from '../../../constant/API';

function CallToAction() {
    const [ showAlert, setShowAlert ] = useState(false);
    const [ alertVariant, setAlertVariant ] = useState('default');
    const [ alertText, setAlertText ] = useState('');
    const [ isLoaded, setIsLoaded ] = useState(true);

    const [ lang, setLang ] = useState({});
    const [ email, setEmail ] = useState('');
    const [ formError, setFormError ] = useState('');


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


    const emailChangeHandler = (e) => {
        setFormError('');
        if (e.target.value.trim() == '') {
            setFormError(lang.email_required);
        }

        setEmail(e.target.value);
    }


    const sendMessageHandler = () => {
        setIsLoaded(false);

        axios.post(API.message_cta, { 'email': email })
            .then(response => {
                let responseBody = response.data;

                setIsLoaded(true);
                if (responseBody.status == 200) {
                    setShowAlert(true);
                    setAlertVariant('success');
                    setAlertText(responseBody.message);
                    setEmail('');
                }
            })
            .catch(error => {
                let responseBody = error.response.data;

                setIsLoaded(true);

                setShowAlert(true);
                setAlertVariant('danger');
                setFormError('');

                if (responseBody.status == 400) {
                    setAlertText(responseBody.message.email[0]);
                }
                else {
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
                    onChange={emailChangeHandler} />
                {isLoaded
                    ?   <button
                            type="button"
                            className="w-3/4 lg:w-1/2 ml-4 py-4 px-6 bg-ib-three hover:bg-opacity-70 transition-all duration-500 border border-solid border-ib-three text-ib-four rounded-md focus:outline-none md:text-lg"
                            onClick={sendMessageHandler}>
                                {lang.send_message}
                        </button>
                    :   <button
                            type="button"
                            className="w-3/4 lg:w-1/2 ml-4 py-4 px-6 bg-ib-three bg-opacity-50 transition-all duration-500 border border-solid border-ib-three text-ib-four rounded-md focus:outline-none md:text-lg"
                            onClick={sendMessageHandler}>
                                {lang.loading}...
                        </button>
                }
            </div>
            {formError
                ?   <FormError>{formError}</FormError>
                :   null
            }
        </div>
    );
}

export default CallToAction;

if (document.getElementById('cta-ui-content')) {
    ReactDOM.render(<CallToAction/>, document.getElementById('cta-ui-content'));
}