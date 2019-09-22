import React from 'react';

const InternationalAirlines = props =>(
    <select className={props.className} title="فرودگاه مبدا" name={props.name} id={props.prefix +'_'+props.name}>
    
    <option value="" disabled selected>{props.Placeholder}</option>

</select>
);

export default InternationalAirlines;