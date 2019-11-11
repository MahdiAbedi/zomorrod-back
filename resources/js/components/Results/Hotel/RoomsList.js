import DateSelector from '../../DateSelector';
import HotelPassengerCount from '../../SearchPanel/HotelPassengerCount';
import Axios from 'axios';
class RoomsList extends React.Component{

    constructor(props){
        super(props);
        this.state={
            Rooms:[]
        }
    }

    componentDidMount(){
        this.getRooms();
    }
    getRooms(){
        axios.post('/getRooms',{
            "SessionId": "9b4435ff-6504-ea11-b732-00155dbd6c0c",
            
          })
        .then((response)=>{
           // this.setState({Rooms:response.data})
           console.log(response)
        })

        .catch((error)=>{
            console.log(error)
        })
    }
   
    render(){
        return(
            <>
            {/* <!-- جستجوی مجدد بر اسات تاریخ ورود و خروج و نفرات  --> */}
                <div className="hotel_detail_filters">
                <form  className="search" style={{width:'100%'}}>
                   
                   <div className="group ">
                       
                       <DateSelector name="checkIn" prefix="hotel" className="margin-right"/>
                   </div>
                   <div className="group">
                   <DateSelector name="checkOut" prefix="hotel"/>
                   </div>
                   <div className="group">
                       <HotelPassengerCount prefix="hotel"/>
                   </div>
                   <div className="group">
                       <input type="button" className="btn btn-zgray" value="جستجو"/>
                       <i className="icon-search"></i>
                   </div>
    
               </form>
                </div>
    
                {/* <!-- مشخصات اتاقها و فاکتور --> */}
                <div className="rooms">
                    <table className="rounded_table">
                        <thead>
                            <tr>
                                <th>نام و مشخصات اتاق</th>
                                <th>تعداد تخت</th>
                                <th>انتخاب تعداد اتاق</th>
                                <th>قیمت برای 3 شب</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>
                                <p>Standard Twin Room</p>
                                <p className="green">Female Dorm</p>
                                <p>Room Only</p>
                            </td>
                            <td>
                                <input type="number" name="roomCount" id="" min="1" max="10" value="1"/>
                            </td>
                            <td>
                                <input type="number" name="roomCount" id="" min="1" max="10" value="1"/>
                            </td>
                            <td name="money">74,880,00 ریال</td>
                        </tr>
                       
    
                    </table>
    
                    <div className="factor column">
                        <p className="title">فاکتور</p>
                        <div className="factor_detail flex">
                            <span>
                                <p className="green">مقصد:</p>
                                <p>دبی امارات متحده عربی</p>
                            </span>
                            <span>
                                <p>Standard Twin Room</p>
                                <span className="stars">
                                   
                                        <i className="fa fa-star green"></i>
                                        <i className="fa fa-star green"></i>
                                        <i className="fa fa-star green"></i>
                                        <i className="fa fa-star green"></i>
                                        <i className="far fa-star green"></i>
                                    
                                </span>
                            </span>
                            <span>
                                <p className="green">74,880,000 تومان</p>
                                <a href="#" className="btn btn-zgreen">پرداخت</a>
                            </span>
                        </div>
    
                        <table className="rounded_table">
                            
                            <tr>
                                <td>
                                    Standard Twin Room
                                </td>
                                <td>
                                    2 بزرگسال
                                </td>
                                <td>
                                    1 اتاق
                                </td>
                                <td name="money">74,880,00 ریال</td>
                            </tr>
                            <tr>
                                <td>
                                    Standard Twin Room
                                </td>
                                <td>
                                    2 بزرگسال
                                </td>
                                <td>
                                    1 اتاق
                                </td>
                                <td name="money">74,880,00 ریال</td>
                            </tr>
                            <tr className="green">
                                <td>
                                    جمع مبلغ
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    
                                </td>
                                <td name="money">74,880,00 ریال</td>
                            </tr>
                           
                            
                        </table>
    
    
                        <table className="rounded_table">
                            <thead>
                                <tr>
                                    <th>تاریخ و ساعت ورود</th>
                                    <th>تاریخ و ساعت خروج</th>
                                    
                                </tr>
                            </thead>
                            <tr className="green">
                                <td>
                                    دوشنبه 13/September/2019 ساعت 12:30
                                </td>
                                <td>
                                    دوشنبه 13/September/2019 ساعت 12:30
                                </td>
                                
                            </tr>
                            
                            
                        </table>
    
    
                    </div>
    
    
                </div>
                 {/* <!-- مشخصات اتاقها و فاکتور --> */}
                
                
            </>
        )
    }
}

if(document.querySelector('#RoomsList')){

    ReactDOM.render(<RoomsList/> , document.querySelector('#RoomsList'));
}