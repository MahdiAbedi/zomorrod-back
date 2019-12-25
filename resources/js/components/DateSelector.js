
import DatePicker from 'react-datepicker2';


class DateSelector extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      value: moment(),
      isGregorian:false,
    };

    // this.enabledRange = {
    //   min: moment(localStorage.getItem('departureTime')),
    // };
    this.enabledRange = {
      min: moment(),
      max: moment().add(180,'days')
    };


    //Disable By Date Range 
    // this.disabledRanges = [
    //   { 
    //     color: 'brown', 
    //     start:moment().add(0,'days'), 
    //     end:moment().add(60,'days') 
    //   }
     
    // ]
    // limit selection to current months days

    
      // this.enabledRange = {
      //   min: moment(),
      // };
    
    

  }//constructor


  componentDidMount(){
    let newDate =localStorage.getItem(this.props.name);
    if(newDate !==null){
      //اگر تاریخ ذخیره شده گذشته باشد تاریخ امروز را نشان بده
      if(!moment(newDate).isBefore(moment())){

        this.setState({value:moment(newDate)})
      }
    }
  }

  onChangeMe = (value)=>{
    alert('hello')
  }

  render() {
    return <div className={"DatePicker " + (this.props.disabled ? 'disabled' : '') }>
            <label className="dateTitle">{this.props.title}</label>
            <DatePicker
              min={this.enabledRange.min}
              max={this.enabledRange.max}
              ranges={this.disabledRanges}
              timePicker={false}
              value={this.state.value}
              disabled={this.props.disabled}
              isGregorian={this.state.isGregorian}
              onChange={value => {()=>this.setState({ value })}}
            />

            <input type="hidden" name={this.props.name} id={this.props.prefix+'_'+this.props.name} value={MiladiFormat(this.state.value)} className={this.props.className}/>


            <br />
            <a onClick={() => this.setState({ isGregorian: !this.state.isGregorian })} className="button">
              {this.state.isGregorian?'FA':'EN'}
            </a>
          </div>
  }
}



  export default DateSelector;