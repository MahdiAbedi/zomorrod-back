
import React from 'react';
import moment from 'moment-jalaali';
import DatePicker from 'react-datepicker2';


class DateSelector extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      value: moment(),
      isGregorian:false,
    };
  }
  render() {
    return <div className={"DatePicker " + (this.props.disabled ? 'disabled' : '')}>
      
            <DatePicker
              timePicker={false}
              value={this.state.value}
              disabled={this.props.disabled}
              placeholder='heel'
              isGregorian={this.state.isGregorian}
              onChange={value => this.setState({ value })}
            />
            <br />
            <a onClick={() => this.setState({ isGregorian: !this.state.isGregorian })} className="button">
              {this.state.isGregorian?'FA':'EN'}
            </a>
          </div>
  }
}



  export default DateSelector;