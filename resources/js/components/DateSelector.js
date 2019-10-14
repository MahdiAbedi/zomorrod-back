
import DatePicker from 'react-datepicker2';


class DateSelector extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      value: moment(),
      isGregorian:false,
    };
  }

  //کلا باید تاریخ میلادی به وب سرویس ارسال بشه
  MiladiFormat(inputValue) {
    if (!inputValue)
      return '';
    return inputValue.locale('es').format('YYYY-MM-DDThh:mm:ss');
  }


  render() {
    return <div className={"DatePicker " + (this.props.disabled ? 'disabled' : '')}>
      
            <DatePicker
              name="testTime"
              timePicker={false}
              value={this.state.value}
              disabled={this.props.disabled}
              placeholder='heel'
              isGregorian={this.state.isGregorian}
              onChange={value => this.setState({ value })}
            />

            <input type="hidden" name={this.props.name} id={this.props.prefix +'_'+this.props.name} value={this.MiladiFormat(this.state.value)}/>


            <br />
            <a onClick={() => this.setState({ isGregorian: !this.state.isGregorian })} className="button">
              {this.state.isGregorian?'FA':'EN'}
            </a>
          </div>
  }
}



  export default DateSelector;