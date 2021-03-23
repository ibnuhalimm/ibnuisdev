import React, { useEffect, useState } from 'react';
import { connect } from 'react-redux';
import Modal from '../../../components/Modal';
import ModalContent from '../../../components/ModalContent';
import ModalHeader from '../../../components/ModalHeader';
import ModalTitle from '../../../components/ModalTitle';
import ModalBody from '../../../components/ModalBody';
import PortfolioItem from '../../../components/PortfolioItem';
import API from '../../../constant/API';
import ButtonRounded from '../../../components/ButtonRounded';
import ButtonLinkRounded from '../../../components/ButtonLinkRounded';

function Portfolio(props) {
    let { langPack } = props;

    const [ lang, setLang ] = useState({});

    const [ isLoaded, setIsLoaded ] = useState(false);
    const [ isModalOpen, setIsModalOpen ] = useState(false);

    const [ projects, setProjects ] = useState([]);
    const [ project, setProject ] = useState({});


    useEffect(() => {
        langPack.lang ? setLang(langPack.lang) : null;
        _getPortfolio(1);
    }, [langPack, _getPortfolio]);


    const _getPortfolio = (page) => {
        Axios.get(API.portfolio + '?page=' + page + '&limit=6')
            .then(response => {
                let responseBody = response.data;
                let allProjects = [ ...projects, ...responseBody.data.projects ];

                setProjects(allProjects);
                setIsLoaded(true);
            })
    }


    const _getSinglePortfolio = (id) => {
        Axios.get(API.portfolio + '/' + id)
            .then(response => {
                let responseBody = response.data;
                setProject(responseBody.data.project);
                setIsModalOpen(true);
            });
    }


    const viewProjectHandler = (id, event) => {
        event.preventDefault();
        _getSinglePortfolio(id);
    }


    const closeModalHandler = () => {
        setIsModalOpen(false);
    }


    return (
        <div>
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-0 lg:gap-6">
                {projects.map((data, key) => {
                    return <PortfolioItem
                        key={key}
                        name={data.name}
                        image={data.image_url}
                        actViewProject={lang.view_project}
                        viewProjectHandler={(e) => viewProjectHandler(data.id, e)} />
                })}
            </div>
            {isLoaded
                ?   <div className="mt-6 xl:mt-12 flex justify-center">
                        <ButtonLinkRounded
                            href={API.base_url + '/portfolio'}
                            variant="primary">
                            {lang.more_portfolio}
                        </ButtonLinkRounded>
                    </div>
                : null
            }


            <Modal isOpen={isModalOpen}>
                <ModalContent>
                    <ModalHeader>
                        <ModalTitle text={lang.project_detail} />
                    </ModalHeader>
                    <ModalBody>
                        <div className="mb-6 text-ib-one text-sm flex flex-col xl:flex-row justify-between">
                            <div className="w-full xl:w-2/5 mb-6">
                                <img src={project.image_url} alt={project.name} className="w-full h-auto" />
                            </div>
                            <div className="xl:w-3/5 xl:ml-8">
                                <h4 className="font-bold">
                                    {lang.name}
                                </h4>
                                <p className="mb-4">
                                    {project.name}
                                </p>
                                <h4 className="font-bold">
                                    {lang.description}
                                </h4>
                                <p className="mb-4">
                                    {project.description}
                                </p>
                                <h4 className="font-bold">
                                    {lang.link_demo}
                                </h4>
                                <p className="mb-4">
                                    {project.link
                                        ?   <a href={project.link} className="text-ib-three hover:underline" target="_blank" rel="noreferrer">
                                                {project.link}
                                            </a>
                                        : '-'
                                    }
                                </p>
                            </div>
                        </div>
                        <div className="text-center">
                            <ButtonRounded
                                variant="primary"
                                onClick={closeModalHandler}>
                                    {lang.close}
                            </ButtonRounded>
                        </div>
                    </ModalBody>
                </ModalContent>
            </Modal>

        </div>
    );
}


const mapStateToProps = state => {
    return { langPack: state.lang };
};

export default connect(mapStateToProps)(Portfolio);