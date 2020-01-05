import DateSelector from '../DateSelector';
import HotelPassengerCount from './HotelPassengerCount';
import Axios from 'axios';

class TourTicket extends React.Component{

    constructor(props){
        super(props);
        this.state={
            tours:[]
        }
    }

   componentDidMount=()=>{
        Axios.get('/getTours')
            .then((response)=> {
                // handle success
                this.setState({tours:response.data});
                // console.log(response);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .finally(function () {
                // always executed
            });
   }

   submit=()=>{
    //    alert('hello')
        var e = document.getElementById("tourCity");
        // var strUser = e.options[e.selectedIndex].value;
        window.location.replace("/tours/" + e.options[e.selectedIndex].value);
   }

    render(){
        return (
            <div className="form" id="TourTicket"  style={{display:'none'}}>
            {/* <!-- فیلترهای پروازها --> */}
            <div className="filters" >
                <input type="radio" value="0" id="iranTours" name="Tours" checked/>
                <label for="iranTours">داخلی</label>
                <input type="radio" value="1" id="Tours" name="Tours" checked/>
                <label for="Tours">خارجی</label>
                
            </div>
            {/* <!-- فیلدهای جستجو --> */}
            <form  className="search">
               
                <div className="group magin-right">
                    <select name="tourCity" id="tourCity" className="select2">
                        <option value="" disabled selected>انتخاب تور </option>

                        {this.state.tours.map((tour)=>{
                            return <option value={tour.alias}  >{tour.name}</option>

                        })}


                    </select> 
                   
                </div>
                <div className="group margin-right">
                    
                    <DateSelector name="checkIn" prefix="hotel" title="تاریخ ورود"/>
                </div>
                <div className="group">
                <DateSelector name="checkOut" prefix="hotel" title="تاریخ خروج"/>
                </div>
                {/* <div className="group">
                    <HotelPassengerCount prefix="hotel"/>
                </div> */}
                <div className="group">
                    <input type="button" onClick={()=>this.submit()} className="btn btn-zgreen" value="جستجو"/>
                    <i className="icon-search"></i>
                </div>

            </form>
        </div>
        );
    }

}


export default TourTicket;