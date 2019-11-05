import './LoadingModal.css';

function LoadingModal(){
    
        return(
            <div className="available-loading-modal">
                <div className="relative">
                    <img src="images/ManForLoadingResults.png" className="available-loading-modal__image"/>
                    <div className="available-loading-modal__body">
                        <div className="available-loading-modal__lottie">
                            <img src="/images/loader.gif" />
                        </div>
                        <img src="/images/worldmapForLoadingResults.png" className="available-loading-modal__map"/>
                    </div>
                </div>
                <div className="available-loading-modal__info">
                    <p className="available-loading-modal__text">
                        ستاره زمرد در حال جستجوی بهترین پروازها برای شماست
                    </p>
                    <div className="available-loading-modal__dots">
                    </div>
                </div>
            </div>
        )
    
}
export default LoadingModal;
