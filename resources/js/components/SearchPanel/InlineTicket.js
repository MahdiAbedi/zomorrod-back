import DateSelector from '../DateSelector';
import PassengerCount from './PassengerCount';
import IranAirports from './IranAirports';

class InlineTicket extends React.Component{

    constructor(props){
        super(props);
        this.state={toWay:true}
    }

    showReturnDate = ()=>{
        this.setState({toWay:true});
    }

    //هنگام ارسال فرم
    submitForm=(event)=>{
        // alert(this.state.toWay)
        event.preventDefault();
        //برای ذخیره کردن مسیر رفت و برگشت تو لیست جستجوی پرواز داخلی
        // localStorage.setItem("inline_origin"         , $('#inline_origin').val());                               //مسیر رفت
        // localStorage.setItem("inline_destination"    , $('#inline_destination').val());                          //مسیر برگشت
       
        localStorage.setItem("origin"         , $('#inline_origin').val());                               //مسیر رفت
        localStorage.setItem("destination"    , $('#inline_destination').val());                          //مسیر برگشت
        localStorage.setItem("departureTime"  , document.getElementById('inline_departureTime').value);   //زمان رفت
        localStorage.setItem("returnTime"     , document.getElementById('inline_returnTime').value);      //زمان برگشت
        localStorage.setItem("adult"          , document.getElementById('inline_adult').value);           //زمان برگشت
        localStorage.setItem("child"          , document.getElementById('inline_child').value);           //زمان برگشت
        localStorage.setItem("infant"         , document.getElementById('inline_infant').value);          //زمان برگشت
        localStorage.setItem("IsRoundTrip"    , !this.state.toWay);                                       //آیا دو مسیره است یا نه؟ 

        window.location.replace("/flights");

    }

    hideReturnDate = ()=>{
        this.setState({toWay:false});
    }


    render(){
        return (
        <div className="form" id="InlineTicket" style={{display:'none'}}>
            {/* <!-- فیلترهای پروازها --> */}

             <div className="filters" >
                <input type="radio" value="oneWay" id="inline-oneWay" name="inline-ticket" onClick={this.showReturnDate} checked={this.state.toWay}/>
                <label htmlFor="inline-oneWay">یک طرفه</label>
                <input type="radio" value="toWay" id="inline-toWay" name="inline-ticket"  onClick={this.hideReturnDate} checked={!this.state.toWay}/>
                <label htmlFor="inline-toWay">رفت و برگشت</label>
            </div>


            {/* <!-- فیلدهای جستجو --> */}
            <form  className="search" onSubmit={this.submitForm}> 
                <div className="group margin-right">

                    <IranAirports className="right-border select2" Placeholder="فرودگاه مبدا" id="inline_origin"/>

                    <button className="round-btn"><i className="icon-transfer"><img src="img/change-way.png"
                                alt=""/></i>
                    </button>

                </div>
                <div className="group">
                <IranAirports className="left-border select2" Placeholder="فرودگاه مقصد" id="inline_destination"/>

                </div>
                <div className="group margin-right">
                <DateSelector name="departureTime" prefix="inline" title="تاریخ رفت"/>
                </div>
                <div className="group">
                <DateSelector name="returnTime" prefix="inline"  disabled={this.state.toWay} title="تاریخ بازگشت"/>
                </div>
                <div className="group">
                <PassengerCount prefix="inline"/>
                </div>
                <div className="group">
                    <input type="submit" className="btn btn-zgreen" value="جستجو"/>
                    <i className="icon-search"></i>
                </div>

            </form>
        </div>
        );
    }

}


export default InlineTicket;