import './HotelPassengerCount.css';
//لیست سن تمام بچه های همه اتاق ها 
let hotelPassengersList = [{
    'adult':1,
    'child':0,
    'ChildAges':[]
    }];
class PassengerCount extends React.Component{
    constructor(props){
        super(props);
        this.state={
            adult:0,
            child:0,
            display:0,
            rooms:1,        // تعداد اتاقهایی که انتخاب کردیم
            roomsList:[]    //اطلاعات مسافران هر اتاق اینجا ذخیره میشه
        };
    }

    componentDidMount(){
        localStorage.setItem('hotelPassengersList',JSON.stringify(hotelPassengersList))
    }

    delete=()=>{
        this.setState({
            rooms:this.state.rooms-1
        })
    }


    deleteAdult=()=>{
        this.setState({
            adult : this.state.adult - 1 
        })
    }
    deleteAdult=(index=1)=>{
        this.setState({
            adult : this.state.adult - index 
        })
    }
    addAdult=()=>{
        this.setState({
            adult : this.state.adult + 1 
        })
    }
    deleteChild=(index=1)=>{
        this.setState({
            child : this.state.child - index 
        })
    }
    addChild=()=>{
        this.setState({
            child : this.state.child + 1 
        })
    }


    render(){

        let counters = []
        for(let index=1;index<=this.state.rooms;index++){

            counters.push(<RoomCounter index={index} delete={this.delete} deleteAdult={this.deleteAdult} addAdult={this.addAdult} deleteChild={this.deleteChild} addChild={this.addChild} />)
        }
        return(

        <span>

            <input type="text"  className="left-border"  placeholder="تعداد مسافر" value={this.state.adult +" بزرگسال ," + this.state.child +" کودک ," + this.state.rooms +" اتاق "} contenteditable="false" onClick={()=>{this.setState({display:!this.state.display})}}/>
            
            <div className="passengers_count_container hotel_passengers_count" style={{display:(this.state.display ? 'block' :'none')}}>
               <span id="counterId">
                {counters}
               </span>
               <button className="btn btn-zgreen" onClick={(e)=>{e.preventDefault();this.setState({rooms:this.state.rooms + 1})}}> + افزودن اتاق</button>

            </div>

        </span>
        );
    }



}//class

// ###############################################################################################################################
// ################################## کامپوننت اضافه کردن اتاق و مشخصات مسافران هر اتاق ######################################
// ###############################################################################################################################


class RoomCounter extends React.PureComponent{
    // سن بچ های همین اتاق
    tempArray=[];
    constructor(props){
        super(props);
        
        this.state={
            adult:1,
            child:0,
            infant:0,
            display:0,
            childAges:[],
        };
    }
    componentDidMount(){
        this.props.addAdult();
    }

    componentDidUpdate(){
        
        let RoomInfo={
            'adult':this.state.adult,
            'child':this.state.child,
            'ChildAges':this.state.childAges
        };
        // console.log(RoomInfo) 
        //چون ایندکس در نام گذاری اتاق تاثیر داره اینجا از ایندکس کم میکنیم در کامپوننت والد
        hotelPassengersList[this.props.index-1]=RoomInfo;
        console.log(hotelPassengersList)
        localStorage.setItem('hotelPassengersList',JSON.stringify(hotelPassengersList))
    }
    

    deleteAdult=()=>{
        if(this.state.adult>1){
            this.setState({
                adult : this.state.adult -1
            })

            this.props.deleteAdult();
        }
        
    }//delete Adult
    addAdult=()=>{
        
            this.setState({
                adult : this.state.adult +1
            })
            this.props.addAdult();
        
        
    }//delete Adult
    deleteChild=()=>{
        if(this.state.child>0){
            this.setState({
                child : this.state.child -1
            })

            this.props.deleteChild();
        }
        
    }//delete Adult
    addChild=()=>{        
            this.setState({
                child : this.state.child +1
            })
            // this.tempArray.push(0)
            this.props.addChild();
        
        
    }//delete Adult

    // #################### اضافه کردن سن کودک به لیست ###########################
    // addChildAge=(age)=>{
    //     // alert(age)
    //     var joined = this.state.childAges.concat(age);
    //     this.setState({
    //         childAges : joined
    //     })
    // }


    deleteMe=()=>{
        this.props.deleteAdult(this.state.adult)
        this.props.deleteChild(this.state.child)
        this.props.delete();
    }

    //############################### REFRESH THE CHILDS AGES LIST ############################
    // refreshChildsAgeList(){
    //     this.setState({childAges:tempArray});
    // }
    render(){

        let childAge = []
        for(let index=0;index<=this.state.child-1;index++){
            if(!this.tempArray[index])
                {
                    this.tempArray[index]=0;
                    // this.setState({childAges:tempArray});
                }
            childAge.push(<div className="child_age" key={index}>
                    <p>سن کودک {farsiCounter(index)}</p>
                    <select name="childAge" id={index} onChange={(e)=>{this.tempArray[index]=e.target.value;this.setState({childAges:this.tempArray});}}>
                        <option value="0">0 تا 1 سال</option>
                        <option value="1">1 تا 2 سال</option>
                        <option value="2">2 تا 3 سال</option>
                        <option value="3">3 تا 4 سال</option>
                        <option value="4">4 تا 5 سال</option>
                        <option value="5">5 تا 6 سال</option>
                        <option value="6">6 تا 7 سال</option>
                        <option value="7">7 تا 8 سال</option>
                        <option value="8">8 تا 9 سال</option>
                        <option value="9">9 تا 10 سال</option>
                        <option value="10">10 تا 11 سال</option>
                        <option value="11">11 تا 12 سال</option>
                    </select>
                </div>)
        }

        return(

        // <span name={`room${this.props.index}`}>
        <span name="rooms">

            {/* قسمت دریافت اطلاعات هر مسافر که مخفی است */}
            {/* <input type="hidden" name={this.props.prefix + '_adult[]'} id={this.props.prefix + '_adult'} value={this.state.adult} />
            <input type="hidden" name={this.props.prefix + '_child[]'} id={this.props.prefix + '_child'} value={this.state.child} />
            <input type="hidden" name={this.props.prefix + '_infant[]'} id={this.props.prefix + '_infant'} value={this.state.infant} /> */}

                <div className="deleteRoom">
                    <h4>اتاق {farsiCounter(this.props.index)}</h4>
                    <p onClick={()=>{this.deleteMe()}}>{(this.props.index > 1) ? 'X' : ''}</p>
                </div>
            
                <div className="passengers_count">
                    <label>بزرگسال <small>(12 سال به بالا)</small></label>
                    <span className="count">
                        <button type="button" className="plus-btn" onClick={()=>this.addAdult()}>+</button>
                        <span>{this.state.adult}</span>
                        <button type="button" className="plus-btn" onClick={()=>this.deleteAdult()}>-</button>
                    </span>
                </div>
                <div className="passengers_count">
                    <label>کودک <small>(زیر 12 سال)</small></label>
                    <span className="count">
                        <button type="button" className="plus-btn" onClick={()=>this.addChild()}>+</button>
                        <span>{this.state.child}</span>
                        <button type="button" className="plus-btn" onClick={()=>this.deleteChild()}>-</button>

                    </span>
                </div>

                {childAge}
               
                <br/>
               <hr/>
        </span>
        );
    }

}//Hotel Counter

// ###########################################################################################################
export default PassengerCount;