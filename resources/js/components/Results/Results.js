import Ticket from './Ticket';
class Results extends React.PureComponent{
    constructor(props){
        super(props);
    }

    render(){
        
            return(
                <section className="results ">
                {/*<!-- قسمت مرتبط سازی نتایج بر اساس قیمت و.. و نمایش تاریخ --> */}
                    <section className="sorting flex">
                        <section className="sort">
                            <ul className="flex">
                                <li><a href="#"><i className="fas fa-sort-amount-up-alt"></i>ساعت پرواز</a></li>
                                <li><a href="#"><i className="fas fa-sort-amount-up-alt"></i>ظرفیت</a></li>
                                <li><a href="#"><i className="fas fa-sort-amount-down-alt"></i>قیمت</a></li>
                                <li><a href="#"><i className="fas fa-sort-amount-down-alt"></i>ارزانترین نرخ های بلیط در بازه 7
                                        روزه</a></li>
                            </ul>
                        </section>
                        <section className="date">
                            <ul className="flex">
                                <li><a href="#"><i className="fas fa-angle-right"></i>روز قبل</a></li>
                                <li className="current-date"><a href="#">{moment(localStorage.getItem('departureTime')).format('jYYYY/jMM/jDD')}</a></li>
                                <li><a href="#">روز بعد<i className="fas fa-angle-left"></i></a></li>
                            </ul>
                        </section>
                    </section>
                {/*
                <!-- بخش نمایش تیکت ها --> */}
                    <section className="tickets">
            
                    {this.props.tickets.map((ticket,index)=>{
                            return <Ticket key={index} index={index} ticket={ticket} isInline={this.props.isInline}/>
                            // return <TwoWayInternationalTicket index={index} AirItineraryPricingInfo={ticket.AirItineraryPricingInfo} OriginDestinationOptions={ticket.OriginDestinationOptions}/>
                        })}
                        {/*<!-- یک تیکت تک --> */}
                            
                    </section>
            </section>
           );    
    }
}

export default Results;