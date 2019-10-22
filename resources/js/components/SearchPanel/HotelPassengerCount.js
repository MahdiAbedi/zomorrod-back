import './HotelPassengerCount.css';

class PassengerCount extends React.Component{
    constructor(props){
        super(props);
        this.state={
            adult:0,
            child:0,
            display:0,
            rooms:1
        };
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

            counters.push(<HotelCounter index={index} delete={this.delete} deleteAdult={this.deleteAdult} addAdult={this.addAdult} deleteChild={this.deleteChild} addChild={this.addChild} />)
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


// ################################## Counter Class ######################################
class HotelCounter extends React.Component{
    constructor(props){
        super(props);
        this.state={
            adult:1,
            child:0,
            infant:0,
            display:0
        };
    }
    componentDidMount(){
        this.props.addAdult();
    }

    farsiCounter(index){
        switch (index) {
            case 1:
                return 'اول'
                break;
            case 2:
                return 'دوم'
                break;
            case 3:
                return 'سوم'
                break;
            case 4:
                return 'چهارم'
                break;
        
            default:
                return index
                break;
        }
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
            this.props.addChild();
        
        
    }//delete Adult


    deleteMe=()=>{
        this.props.deleteAdult(this.state.adult)
        this.props.deleteChild(this.state.child)
        this.props.delete();
    }
    render(){
        return(

        <span>

            {/* قسمت دریافت اطلاعات هر مسافر که مخفی است */}
            <input type="hidden" name={this.props.prefix + '_adult'} id={this.props.prefix + '_adult'} value={this.state.adult} />
            <input type="hidden" name={this.props.prefix + '_child'} id={this.props.prefix + '_child'} value={this.state.child} />
            <input type="hidden" name={this.props.prefix + '_infant'} id={this.props.prefix + '_infant'} value={this.state.infant} />

                <div className="deleteRoom">
                    <h4>اتاق {this.farsiCounter(this.props.index)}</h4>
                    <p onClick={()=>{this.deleteMe()}}>{(this.props.index > 1) ? 'X' : ''}</p>
                </div>
            
                <div className="passengers_count">
                    <label>بزرگسال (<small>12 سال به بالا</small>)</label>
                    <span className="count">
                        <button type="button" className="plus-btn" onClick={()=>this.addAdult()}>+</button>
                        <span>{this.state.adult}</span>
                        <button type="button" className="plus-btn" onClick={()=>this.deleteAdult()}>-</button>
                    </span>
                </div>
                <div className="passengers_count">
                    <label>کودک (<small>زیر 12 سال</small>)</label>
                    <span className="count">
                        <button type="button" className="plus-btn" onClick={()=>this.addChild()}>+</button>
                        <span>{this.state.child}</span>
                        <button type="button" className="plus-btn" onClick={()=>this.deleteChild()}>-</button>

                    </span>
                </div>
                <br/>
               <hr/>
        </span>
        );
    }

}//class

export default PassengerCount;