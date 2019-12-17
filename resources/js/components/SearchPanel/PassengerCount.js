class PassengerCount extends React.Component{
    constructor(props){
        super(props);
        this.state={
            adult:1,
            child:0,
            infant:0,
            display:0
        };
    }

    // ######################### اضافه کردن نوزاد ##################################
    addInfant = () =>{

        if(this.checkPassengersCount()){

            //تعداد نوزاد نباید بیشتر از تعداد بزرگسالان باشد
            //Per ADT 1 INF can be select
            if(this.state.infant + 1 > this.state.adult){
                FlashMessage('تعداد نوزاد نمیتواند از تعداد بزرگسالان بیشتر باشد.');
            }else{

                this.setState({infant:this.state.infant + 1})
            }
        }
       
    }

    // ######################## افزودن بزرگسال #######################################
    addAdult =()=>{
        if(this.checkPassengersCount()){

            this.setState({adult:this.state.adult + 1})
        }
    }

    // ########################### حذف بزرگسال #######################################
    removeAdult = ()=>{
        if(this.state.adult - 1 > 0){
            this.setState({adult:this.state.adult -1 })
        }else{
            FlashMessage('حداقل یک بزرگسال باید در پرواز باشد.');
        }
    }
    // ######################## افزودن بزرگسال #######################################
    addChild =()=>{
        if(this.checkPassengersCount()){

            this.setState({child:this.state.child + 1})
        }
    }



    // ########################## چک کردن مجموع مسافران #####################################
    checkPassengersCount =()=>{
        if(this.state.adult + this.state.child + this.state.infant +1 >10){
            FlashMessage('مجموع مسافران اعم از بزرگسال ،کودک و نوزاد نباید بیشتر از 10 نفر باشد');
            return false;
        }
        return true;
    }



    render(){
        return(

        <span id={this.props.prefix + '_passengers_count_container_click'}>

            {/* قسمت دریافت اطلاعات هر مسافر که مخفی است */}
            <input type="hidden" name={this.props.prefix + '_adult'} id={this.props.prefix + '_adult'} value={this.state.adult} />
            <input type="hidden" name={this.props.prefix + '_child'} id={this.props.prefix + '_child'} value={this.state.child} />
            <input type="hidden" name={this.props.prefix + '_infant'} id={this.props.prefix + '_infant'} value={this.state.infant} />


            <input type="text"  className="left-border"  placeholder="تعداد مسافر" value={this.state.child + this.state.adult + this.state.infant +" مسافر "} contenteditable="false" onClick={()=>{this.setState({display:!this.state.display})}}/>

            <div className="passengers_count_container" style={{display:(this.state.display ? 'block' :'none')}} id={this.props.prefix + '_passengers_count_container'}>
                <div className="passengers_count">
                    <label>بزرگسال</label>
                    <span className="count">
                        <button type="button" className="plus-btn" onClick={()=>this.addAdult()}>+</button>
                        <span>{this.state.adult}</span>
                        <button type="button" className="plus-btn" onClick={()=>this.removeAdult()}>-</button>
                    </span>
                </div>
                <div className="passengers_count">
                    <label>کودک</label>
                    <span className="count">
                        <button type="button" className="plus-btn" onClick={()=>this.addChild()}>+</button>
                        <span>{this.state.child}</span>
                        <button type="button" className="plus-btn" onClick={()=>this.setState({child:(this.state.child>0)? this.state.child - 1 : this.state.child})}>-</button>

                    </span>
                </div>
                <div className="passengers_count">
                    <label>نوزاد</label>
                    <span className="count">
                        <button type="button" className="plus-btn" onClick={()=>this.addInfant()}>+</button>
                        <span>{this.state.infant}</span>
                        <button type="button" className="plus-btn" onClick={()=>this.setState({infant:(this.state.infant>0)? this.state.infant - 1 : this.state.infant})}>-</button>
                    </span>
                </div>
            </div>

        </span>
        );
    }



}

export default PassengerCount;