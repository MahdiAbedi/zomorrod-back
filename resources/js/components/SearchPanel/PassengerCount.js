import React from 'react';
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


    render(){
        return(

        <span>

            {/* قسمت دریافت اطلاعات هر مسافر که مخفی است */}
            <input type="hidden" name={this.props.prefix + '_adult'} id={this.props.prefix + '_adult'} value={this.state.adult} />
            <input type="hidden" name={this.props.prefix + '_child'} id={this.props.prefix + '_child'} value={this.state.child} />
            <input type="hidden" name={this.props.prefix + '_infant'} id={this.props.prefix + '_infant'} value={this.state.infant} />


            <input type="text"  className="left-border" id="mosafer" placeholder="تعداد مسافر" value={this.state.child + this.state.adult + this.state.infant +" مسافر "} contenteditable="false" onClick={()=>{this.setState({display:!this.state.display})}}/>

            <div className="passengers_count_container" style={{display:(this.state.display ? 'block' :'none')}}>
                <div className="passengers_count">
                    <label>بزرگسال</label>
                    <span className="count">
                        <button type="button" className="plus-btn" onClick={()=>this.setState({adult:this.state.adult + 1})}>+</button>
                        <span>{this.state.adult}</span>
                        <button type="button" className="plus-btn" onClick={()=>this.setState({adult:(this.state.adult>0)? this.state.adult - 1 : this.state.adult})}>-</button>
                    </span>
                </div>
                <div className="passengers_count">
                    <label>کودک</label>
                    <span className="count">
                        <button type="button" className="plus-btn" onClick={()=>this.setState({child:this.state.child + 1})}>+</button>
                        <span>{this.state.child}</span>
                        <button type="button" className="plus-btn" onClick={()=>this.setState({child:(this.state.child>0)? this.state.child - 1 : this.state.child})}>-</button>

                    </span>
                </div>
                <div className="passengers_count">
                    <label>نوزاد</label>
                    <span className="count">
                        <button type="button" className="plus-btn" onClick={()=>this.setState({infant:this.state.infant + 1})}>+</button>
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