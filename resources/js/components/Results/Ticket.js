

import Leg from './Leg';
import LegDetail from './LegDetail';
import Axios from 'axios';


class Ticket extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      display: "none",
      displayTitle: "مشاهده جزییات",
      travelTime: '',
      chooseBtnTitle:'انتخاب بلیط'
    };
    this.adult  = localStorage.getItem('adult', 0);
    this.child  = localStorage.getItem('child', 0);
    this.infant = localStorage.getItem('infant', 0);
    this.OriginDestinationOptions = this.props.ticket.OriginDestinationOptions[0];
  }
  //نمایش و یا پنهان کردن جزییات
  checkDisplay = () => {
    if (this.state.display == "none") {
      this.setState({display: "block", displayTitle: "پنهان کردن جزییات"})
    } else {
      this.setState({display: "none", displayTitle: " مشاهده جزییات"})
    }
  }//checkDisplay
  //############################################## انتخاب بلیط ########################################################
  chooseTicket = () => {
    this.setState({chooseBtnTitle:"در حال بررسی ..."});
    //ذخیره سازی کل اطلاعات تیکت
    // localStorage.setItem('ticket',JSON.stringify(this.props.ticket));
    // ارجاع به صفحه وارد کردن اطلاعات مسافر
    localStorage.setItem('FareSourceCode',this.props.ticket.FareSourceCode);

    // ذخیره قیمت بلیط در سشن
    localStorage.setItem('TicketPrice',this.props.ticket.AirItineraryPricingInfo.ItinTotalFare.TotalFare);

    //================================== اطلاعات لگ رفت ============================
    localStorage.setItem('first_let_charter',this.OriginDestinationOptions.FlightSegments[0].IsCharter? 'چارتر': 'سیستمی')
    //#################### SAVE FareSourcecode IN PHP SESSION TO USE IN REVALIDATION EVERY TIME #################
    Axios.post('/setFareSourceCode', {
      FareSourceCode: this.props.ticket.FareSourceCode,
      FareType      : this.props.ticket.AirItineraryPricingInfo.FareType
    })
    .then(function (response) {
      // console.log(response);
    })
    .catch(function (error) {
      // console.log(error);
    });

    //#############################################################################################################
    //############################# REVALIDATE TICKET BEFORE CONTINUE #############################################
    Axios.get('/airRevalidate')
    .then((response) =>{
        // IF VALIDATE THE TICKET SHOW THE USER INFO PAGE ELSE STAY HERE
        // console.log(response.data)
        if(response.status==200){
          // alert('ok')
            // console.log(response.data)
            if(this.props.isInline){
              //اگر بلیط داخلی بود
              window.location.replace("/internal/book");
            }else{
              window.location.replace("/international/book");
            }
        }else{
          FlashMessage('هم اکنون ظرفیت این پرواز تکمیل گردیده است لطفا مجددا جستجو بفرمایید.')
          // setInterval(function(){ window.location.replace("/"); }, 3000);
        }
       
    })
    .catch( (error)=> {
      console.log(error);
      FlashMessage('خطایی هنگام بررسی بلیط انتخاب شده رخ داده است لطفا با پشتیبانی سایت تماس حاصل بفرمایید.')
    });
    // if(this.props.isInline){
    //   //اگر بلیط داخلی بود
    //   window.location.replace("/internal/book");
    // }else{
    //   window.location.replace("/international/book");
    // }

    
  }//################################################### chooseTicket ####################################################

  render() {
    return (
      <div className="ticket-container">
      کد فیر :{this.props.ticket.AirItineraryPricingInfo.FareType}
            <section className="single-ticket flex-between">
                <div className="ticket_type">{this.OriginDestinationOptions.FlightSegments[0].IsCharter
                    ? 'چارتر'
                    : 'سیستمی'}</div>
                <div className="legs">
                  {this.props.ticket.OriginDestinationOptions.map((OrginDestination, index) => {
                      return <Leg  OrginDestination={OrginDestination} index={index} key={index} />
                    })}
                </div>
                <div className="ticket-choose">
                  <p>{this.OriginDestinationOptions.FlightSegments[0].SeatsRemaining == null
                      ? 0
                      : this.OriginDestinationOptions.FlightSegments[0].SeatsRemaining}
                    صندلی باقی مانده</p>
                  <p className="price">{formatCurrency(this.props.ticket.AirItineraryPricingInfo.ItinTotalFare.TotalFare)}
                    <span>ریال</span>
                  </p>
                  <button className="btn btn-zgreen" onClick={this.chooseTicket}>{this.state.chooseBtnTitle}</button>
                </div>
          </section>
        {/* جزییات هر بلیط  */}

            <section className="ticket-detail" style={{display: this.state.display}}>
            {/*
            <!-- عناوین  --> */}
            <div className="detail-border"></div>
            <div className="detail-titles flex">
                <div className="buttons">
                    <button className="btn btn-zgray">قوانین استرداد</button>
                    <button className="btn btn-zgray">قوانین ویزا</button>
                </div>
      
                <ul className="flex">
                    <li>تعداد بزرگسال : <strong>{this.adult}</strong> نفر</li>
                    <li>تعداد کودک: <strong>{this.child}</strong> نفر</li>
                    <li>تعداد نوزاد: <strong>{this.infant}</strong> نفر</li>
                    <li>جمع مبلغ : <strong>{formatCurrency(this.props.ticket.AirItineraryPricingInfo.ItinTotalFare.TotalFare)}</strong> ریال
                    </li>
      
                </ul>
            </div>
      
            {/*
            <!-- جزییات بلیط رفت و برگشت --> */}
            <LegDetail OriginDestinationOptions={this.props.ticket.OriginDestinationOptions}/>
           
        </section>


        {/*<!--انتهای جزییات هر بلیط -->*/}
        <div className="more-info flex-between" onClick={this.checkDisplay}>
          <span>{checkCabinType(this.OriginDestinationOptions.FlightSegments[0].CabinClassCode)}</span>
          <span>
            <i className="fas fa-arrow-circle-up"></i>
            {this.state.displayTitle}
          </span>
          <span></span>
        </div>
      </div>
    );
  }//render


}//Class
export default Ticket;