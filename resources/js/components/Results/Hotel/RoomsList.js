import DateSelector from '../../DateSelector';
import HotelPassengerCount from '../../SearchPanel/HotelPassengerCount';
// import RoomList from './SingleHotel.json';
import SingleRoomList from './SingleRoomList';
class RoomsList extends React.Component{

    constructor(props){
        super(props);
        this.state={
            Rooms:[],
            isLoading:true
        }
    }

    componentDidMount(){
        this.getRooms();
    }
    getRooms(){
        axios.post('/getRooms',{
            HotelId       :document.getElementById('HotelId').value,
            Occupancies   : JSON.parse(localStorage.getItem('hotelPassengersList')),
            checkIn       : PartoDateFormat(localStorage.getItem('hotel_checkIn')),
            checkOut      : PartoDateFormat(localStorage.getItem('hotel_checkOut')),
        })
        .then((response)=>{
           this.setState({Rooms:response.data,isLoading:false})
        })

        .catch((error)=>{
            console.log(error)
        })

        // اطلاعات ذخیره شده در فایل برای تست
        // this.setState({Rooms:RoomList.PricedItineraries});
    }

    searchNewRooms(){
        this.setState({Rooms:[],isLoading:true})
        localStorage.setItem("hotel_checkIn"  , document.getElementById('hotel_checkIn').value);    //زمان ورود به هتل
        localStorage.setItem("hotel_checkOut" , document.getElementById('hotel_checkOut').value);   //زمان خروج از هتل

        // alert(document.getElementById('hotel_checkIn').value)
        this.getRooms();
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
                       <input type="button" onClick={()=>this.searchNewRooms()} className="btn btn-zgray" value="جستجو"/>
                       <i className="icon-search"></i>
                   </div>
    
               </form>
                </div>
                {(this.state.isLoading) ? 'درحال جستجو...':''}
                {(this.state.isLoading ==false && this.state.Rooms.length==0) ? 'جستجوی شما نتیجه ای در بر نداشت.':''}
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