import React from 'react'

class MultiSelect extends React.Component{
    constructor(props){
        super(props)
    }

    render(){
        return(
           <React.Fragment>
                <input list="browsers"/>
                <datalist id="browsers">
                    <option value="Internet Explorer"></option>
                    <option value="Firefox"/>
                    <option value="Chrome"/>
                    <option value="Opera"/>
                    <option value="Safari"/>
                </datalist>
           </React.Fragment> 
        );
    }
}

export default MultiSelect;