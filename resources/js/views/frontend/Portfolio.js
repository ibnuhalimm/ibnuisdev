import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import Modal from '../../components/Modal';
import ModalContent from '../../components/ModalContent';
import ModalHeader from '../../components/ModalHeader';
import ModalTitle from '../../components/ModalTitle';
import ModalBody from '../../components/ModalBody';
import PortfolioItem from '../../components/PortfolioItem';
import API from '../../constant/API';
import ButtonRounded from '../../components/ButtonRounded';

function Portfolio() {
    let [isLoaded, setIsLoaded] = useState(false);
    let [isMore, setIsMore] = useState(false);
    let [isModalOpen, setIsModalOpen] = useState(false);

    let [nextPage, setNextPage] = useState(1);
    let [projects, setProjects] = useState([]);
    let [project, setProject] = useState({});

    let [lang, setLang] = useState({});

    const initialProject = {
        id: 0,
        name: '',
        image_url: '',
        description: '',
        link: '#',
    };

    useEffect(() => {
        _getLangPack();
        _getPortfolio(nextPage);
    }, []);

    const _getLangPack = () => {
        Axios.get(API.lang_pack).then((response) => {
            let responseBody = response.data;
            let language = responseBody.data;

            setLang({
                view_project: language.view_project,
                more_portfolio: language.more_portfolio,
                loading: language.loading,
                project_detail: language.project_detail,
                name: language.name,
                description: language.description,
                link_demo: language.link_demo,
                close: language.close,
            });
        });
    };

    const _getPortfolio = (page) => {
        Axios.get(API.portfolio + '?page=' + page).then((response) => {
            let responseBody = response.data;
            let allProjects = [...projects, ...responseBody.data.projects];

            setIsMore(responseBody.data.is_more);
            if (isMore === true) {
                setNextPage((nextPage += 1));
            }

            setProjects(allProjects);
            setIsLoaded(true);
        });
    };

    const _getSinglePortfolio = (id) => {
        Axios.get(API.portfolio + '/' + id).then((response) => {
            let responseBody = response.data;
            setProject(responseBody.data.project);
            setIsModalOpen(true);
        });
    };

    const loadMoreHandler = () => {
        setIsLoaded(false);
        _getPortfolio(nextPage + 1);
    };

    const viewProjectHandler = (id, event) => {
        event.preventDefault();
        _getSinglePortfolio(id);
    };

    const closeModalHandler = () => {
        setIsModalOpen(false);
        setProject(initialProject);
    };

    return (
        <div>
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-0 lg:gap-6">
                {projects.map((data, key) => {
                    return (
                        <PortfolioItem
                            key={key}
                            name={data.name}
                            image={data.image_url}
                            actViewProject={lang.view_project}
                            viewProjectHandler={(e) => viewProjectHandler(data.id, e)}
                        />
                    );
                })}
            </div>
            {isMore ? (
                <div className="mt-6 xl:mt-12 flex justify-center">
                    {isLoaded ? (
                        <ButtonRounded variant="primary" onClick={() => loadMoreHandler()}>
                            {lang.more_portfolio}
                        </ButtonRounded>
                    ) : (
                        <ButtonRounded variant="primary-loading">{lang.loading}...</ButtonRounded>
                    )}
                </div>
            ) : null}

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
                                <h4 className="font-bold">{lang.name}</h4>
                                <p className="mb-4">{project.name}</p>
                                <h4 className="font-bold">{lang.description}</h4>
                                <p className="mb-4">{project.description}</p>
                                <h4 className="font-bold">{lang.link_demo}</h4>
                                <p className="mb-4">
                                    {project.link ? (
                                        <a
                                            href={project.link}
                                            className="text-ib-three hover:underline"
                                            target="_blank"
                                            rel="noreferrer"
                                        >
                                            {project.link}
                                        </a>
                                    ) : (
                                        '-'
                                    )}
                                </p>
                            </div>
                        </div>
                        <div className="text-center mb-5">
                            <ButtonRounded variant="primary" onClick={() => closeModalHandler()}>
                                {lang.close}
                            </ButtonRounded>
                        </div>
                    </ModalBody>
                </ModalContent>
            </Modal>
        </div>
    );
}

export default Portfolio;

if (document.getElementById('ui-content')) {
    ReactDOM.render(<Portfolio />, document.getElementById('ui-content'));
}
