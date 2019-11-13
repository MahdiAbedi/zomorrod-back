class SingleRoomList extends React.Component{

    constructor(props){
        super(props);
        this.state={
            displayRefund:false
        }
    }

    MealType(name){
        switch (name) {
            case "Room Only":
                return 'بدون وعده غذایی'
                break;
        
            default:
                return name;
                break;
        }
    }
    render(){
        const {room} = this.props;
        return(
            <div className="ticket-container">
                <section className="single-ticket flex-between">
                    {room.NonRefundable ? <div className="ticket_type">بدون استرداد</div> :''}
                    
                    <div className="legs">

                        <div className="first-leg leg flex-between">

                            <p className="destination">{room.Rooms[0].Name} - {room.Rooms[0].BedGroups}
                            </p>

                            <div className="path">
                                <span>{this.MealType(room.Rooms[0].MealType)}</span>
                                <ul className="path flex-between">
                                    <li>
                                        <i className="fa fa-hotel rotate-right"></i>
                                    </li>
                                    <li>
                                        <i className="circle"></i>
                                    </li>
                                </ul>
                                <span><i className="fa fa-users green"></i> {room.Rooms[0].AdultCount} بزرگسال <i className="green fa fa-child"></i> {room.Rooms[0].ChildCount}
                                    کودک</span>
                            </div>


                            <p className="destination">
                                <span>{room.AvailableRoom} اتاق باقی مانده</span>
                            </p>

                        </div>



                    </div>
                    <div className="ticket-choose">
                        <p className="price">{formatCurrency(room.NetRate)}<span>ریال</span></p>
                        <button className="btn btn-zgreen">رزرو اتاق</button>
                    </div>
                </section>

                <section className="ticket-detail" style={{display:this.state.displayRefund ?'block':'none'}}>

                    <div className="detail-border"></div>


                    <ul className="hotel_refund_roles">
                        <li><i className="red far fa-times-circle"></i>در صورت کنسل کردن واچر هتل، مبلغ 2,000,000 ریال کارمزد
                            خدمات از مبلغ کل کسر میگردد</li>
                        <li><i className="red far fa-times-circle"></i>از ساعت 00:29 تاریخ 1398/08/22 غیر قابل استرداد خواهد
                            بود</li>


                    </ul>



                </section>
                <div className="more-info flex-between" onClick={()=>{this.setState({displayRefund:!this.state.displayRefund})}}>
                    <span></span>
                    <span><i className="fas fa-arrow-circle-up"></i> قوانین کنسلی </span>
                    <span></span>
                </div>

            </div>
        )
    }
}


export default SingleRoomList