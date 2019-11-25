import DateSelector from '../../DateSelector';
import HotelPassengerCount from '../../SearchPanel/HotelPassengerCount';
import Axios from 'axios';
import RoomList from './SingleHotel.json';
import SingleRoomList from './SingleRoomList';
class RoomsList extends React.Component{

    constructor(props){
        super(props);
        this.state={
            Rooms:[],
        }
    }

    componentDidMount(){
        this.getRooms();
    }
    getRooms(){
        axios.get('/getRooms')
        .then((response)=>{
           this.setState({Rooms:response.data})
           console.log(response)
        })

        .catch((error)=>{
            console.log(error)
        })

        // اطلاعات ذخیره شده در فایل برای تست
        // this.setState({Rooms:RoomList.PricedItineraries});
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
                <div className="rooms flex">
                    {this.state.Rooms.map((room , index)=>{
                        return( 
                            <SingleRoomList key={index} room={room}/>
                        )
                    })}
                   
                </div>
                {/* <!-- مشخصات اتاقها و فاکتور --> */}
                
                
            </>
        )
    }
}

if(document.querySelector('#RoomsList')){

    ReactDOM.render(<RoomsList/> , document.querySelector('#RoomsList'));
}