
import DatePicker from 'react-datepicker2';


class DateSelector extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      value: moment(),
      isGregorian:false,
    };

    //Disable By Date Range 
    this.disabledRanges = [
      { 
        color: 'brown', 
        start:moment().add(0,'days'), 
        end:moment().add(60,'days') 
      }
     
    ]

  }//constructor


  


  render() {
    return <div className={"DatePicker " + (this.props.disabled ? 'disabled' : '') }>
            <label className="dateTitle">{this.props.title}</label>
            <DatePicker
              ranges={this.disabledRanges}
              timePicker={false}
              value={this.state.value}
              disabled={this.props.disabled}
              isGregorian={this.state.isGregorian}
              onChange={value => this.setState({ value })}
            />

            <input type="hidden" name={this.props.name} id={(this.props.prefix ? this.props.prefix :'') +'_'+this.props.name} value={MiladiFormat(this.state.value)} className={this.props.className}/>


            <br />
            <a onClick={() => this.setState({ isGregorian: !this.state.isGregorian })} className="button">
              {this.state.isGregorian?'FA':'EN'}
            </a>
          </div>
  }
}



  export default DateSelector;