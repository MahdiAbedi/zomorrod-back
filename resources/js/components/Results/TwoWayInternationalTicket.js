import React from 'react';
import moment from 'moment-jalaali';


class TwoWayInternationalTicket extends React.Component{

    
    constructor(props){
        super(props);
        this.state = {
            display: "none",
            displayTitle:"مشاهده جزییات",
            travelTime:''
        };

        this.OriginDestinationOptions=this.props.OriginDestinationOptions[0];
        // this.AirItineraryPricingInfo=this.props.AirItineraryPricingInfo;

    }



    formatCurrency(value){
        // alert(value);
        return value;
        // value = parseInt(value);
        // return parseInt(value).toFixed(0).Replace(/(\d)(?=(\d{3})+(?:\.\d)?$)/g,"$1,");
    }

    formatInsideTagMoney(tagName){
        var divs = document.getElementsByName(tagName);
        for (let index = 0; index < divs.length; index++) {
            divs[index].innerText = formatCurrency(divs[i].innerText);
            
        }
    }

    componentWillMount=() =>
    { 
        this.calcaulateTravelTime();
    } 

    calcaulateTravelTime1=()=>{
        let time=this.OriginDestinationOptions.JourneyDurationPerMinute;
        let hour = parseInt(time/60);
        let min = time % 60;
        // this.travelTime="2 ساعت و 25 دقیقه";
        this.setState({travelTime: `${hour} ساعت و ${min} دقیقه`});
    }
    
    calcaulateTravelTime=(time)=>{
        let hour = parseInt(time/60);
        let min = time % 60;
        // this.travelTime="2 ساعت و 25 دقیقه";
        return `${hour} ساعت و ${min} دقیقه`;
    }

    checkDisplay=()=>{
        if(this.state.display == "none"){
            this.setState({display:"block",displayTitle:"پنهان کردن جزییات"})
        }else{
            this.setState({display:"none",displayTitle:" مشاهده جزییات"})
        }
    }
    //تبدیل تاریخ میلادی به شمسی
    shamsiDate=(Date)=>{
       return moment(Date).format('jYYYY/jM/jD HH:mm')
    }


    //فرمت بندی تاریخ میلادی
    FormatMiladiDate=(requestedDate)=>{
        let OldDate = new Date(requestedDate);
        let formatted_date = OldDate.getFullYear() + "/" + (OldDate.getMonth() + 1) + "/" + OldDate.getDate();
        return formatted_date;
    }
    //فرمت بندی تاریخ میلادی بهمراه ساعت
    FormatMiladiDateHour=(requestedDate)=>{
        let OldDate = new Date(requestedDate);
        let formatted_date = OldDate.getFullYear() + "/" + (OldDate.getMonth() + 1) + "/" + OldDate.getDate()+ " " + OldDate.getHours() + ":" + OldDate.getMinutes() + ":" + OldDate.getSeconds() ;
        
        return formatted_date;
    }


    //نوع کابین
    //Y - 1 - Economy
    //S - 2 - Premium Economy
    //C - 3 - Business
    //J - 4 - Premium Business
    //F - 5 - First
    //P - 6 - Premium First
    //Default - 100 - Default

    checkCabinType=(cabin)=>{
        switch (cabin) {
            case 1:
                return 'Economy-H'
                break;
            case 2:
                return 'Premium Economy-S'
                break;
            case 3:
                return 'Business-C'
                break;
            case 4:
                return 'Premium Business-J'
                break;
            case 5:
                return 'First-F'
                break;
            case 6:
                return 'Premium First-P'
                break;
            default:
                return 'Default'
                break;
        }
    }



    render(){
        return(

              <div className="ticket-container">
                  <section className="single-ticket flex-between">
                      
                      <div className="ticket_type">{this.OriginDestinationOptions.FlightSegments[0].IsCharter ? 'چارتر' :'سیستمی'}</div>
                      <div className="legs">
                          {/*
                          <!-- لگ رفت و برگشت -->
                          <!-- لگ رفت --> */}

                        {this.props.OriginDestinationOptions.map((OrginDestination,index) =>{
                           
                                return <div className="first-leg leg flex-between" key={index}>
                                <div className="logoes ">
                                    {OrginDestination.FlightSegments.map((segment,index)=>{

                                        return <img src={`img/airlines-logo/${segment.MarketingAirlineCode}.png`} key={index} alt={`${segment.MarketingAirlineCode} Airline`}/>
                                    })}
                                </div>
                                {/* مبدا */}
                                <p className="destination"> Tehran  
                                {/* زمان حرکت  */}
                                <span>{this.shamsiDate(OrginDestination.FlightSegments[index].DepartureDateTime)}</span></p>

                                <div className="path">
                                    <span>طول سفر:{this.calcaulateTravelTime(OrginDestination.FlightSegments[index].JourneyDurationPerMinute)} </span>
                                    <ul className="path flex-between">
                                        <li>
                                            <i className={`${index % 2 !=0 ? 'circle':'fa fa-plane rotate-right'} `}></i>
                                        </li>
                                        <li>
                                            <i className={`${index % 2 ==0 ? 'circle':'fa fa-plane rotate-left'} `}></i>
                                        </li>
                                    </ul>
                                    <span>{OrginDestination.FlightSegments[0].StopQuantity} توقف:
                                    {this.OriginDestinationOptions.FlightSegments[1].ArrivalAirportLocationCode},{this.OriginDestinationOptions.FlightSegments[0].DepartureAirportLocationCode}
                                    </span>
                                </div>


                                <p className="destination"> Vancouver    
                                {/* زمان رسیدن */}
                                <span>{moment(this.OriginDestinationOptions.FlightSegments[0].ArrivalDateTime).format('jYYYY/jM/jD HH:mm')}</span></p>

                            </div>
                        
                        })}
                          
                      </div>
                      <div className="ticket-choose">
                          <p>{this.OriginDestinationOptions.FlightSegments[0].SeatsRemaining == null ? 0 :this.OriginDestinationOptions.FlightSegments[0].SeatsRemaining } صندلی باقی مانده</p>
                          <p className="price">{this.formatCurrency(this.props.AirItineraryPricingInfo.ItinTotalFare.TotalFare)} <span>ریال</span></p>
                          <button className="btn btn-zgreen">انتخاب بلیط</button>
                      </div>
                  </section>


                {/* جزییات هر بلیط  */}
                  <section className="ticket-detail"  style={{display:this.state.display}}>
                      {/* <!-- عناوین  --> */}
                      <div className="detail-border"></div>
                      <div className="detail-titles flex">
                          <div className="buttons">
                              <button className="btn btn-zgray">قوانین استرداد</button>
                              <button className="btn btn-zgray">قوانین ویزا</button>
                          </div>


                          <ul className="flex">
                              <li>1 نفر بزرگسال :<small>5/200/000</small>ریال</li>
                              <li>1 نفر کودک :<small>5/200/000</small>ریال</li>
                              <li>1 نفر نوزاد :<small>5/200/000</small>ریال</li>
                              <li>جمع مبلغ:<small>13/200/000</small>ریال</li>

                          </ul>
                      </div>

                      {/*
                      <!-- جزییات بلیط رفت و برگشت --> */}

                    <div className="legs-detail flex">
                      {this.props.OriginDestinationOptions.map((origin,index)=>{
                          return <div className="leg-detail"  key={index}>
                              <h3>پرواز {index%2==0 ? 'رفت' : 'برگشت'}</h3>
                              <p>طول سفر:<span>21h 55m</span></p>
                              <p className="green went-time"><i className="fas fa-calendar-day"></i> تاریخ حرکت:
                                  <small>شنبه،6مهر 1398({this.FormatMiladiDate(origin.FlightSegments[0].DepartureDateTime)})</small></p>

                              {/*
                              <!-- جزییات هر مسیر --> */}

                            {origin.FlightSegments.map((segment,index)=>{
                                // console.log(this.props.OriginDestinationOptions);
                                return <span key={index}>
                                <div className="detail-card">
                                <div className="row">
                                    <strong>{this.FormatMiladiDateHour(segment.DepartureDateTime)}</strong>
                                    <strong>{segment.DepartureAirportLocationCode} <small>(Imam Khomeini Intl)</small></strong>
                                </div>
                                <div className="row">
                                    <img src={`img/airlines-logo/${segment.MarketingAirlineCode}.png`} alt={`${segment.MarketingAirlineCode} Airline`} />
                                    <div className="description">
                                        <small>شماره پرواز:{segment.FlightNumber} / ظرفیت: {segment.SeatsRemaining} نفر</small>
                                        <small>کلاس:{this.checkCabinType(segment.CabinClassCode)}</small>
                                        <small>طول پرواز:{segment.JourneyDuration}</small>
                                        <small>هواپیما: Airbus Industrie A321</small>
                                    </div>
                                </div>
                                <div className="row">
                                    <strong>{this.FormatMiladiDateHour(segment.ArrivalDateTime)}</strong>
                                    <strong>{segment.ArrivalAirportLocationCode} <small>(Istanbul Airport)</small></strong>
                                </div>
                            </div>
                            <div className="stop-detail">
                                <small>جابجایی در Istanbul / طول توقف: 2H 15m</small>
                            </div>
                            </span>
                                    
                            })}   
                          </div>  
                      })}
                      </div>
                      
                  </section>
                  <div className="more-info flex-between" onClick={this.checkDisplay}>
                      <span>{this.checkCabinType(this.OriginDestinationOptions.FlightSegments[0].CabinClassCode)}</span>
                      <span><i className="fas fa-arrow-circle-up"></i> {this.state.displayTitle} </span>
                      <span></span>
                  </div>

              </div>
              
        );
            
    }
}

export default TwoWayInternationalTicket;