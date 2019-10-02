import React from 'react';
import ReactDOM from 'react-dom';

import PassengerInfo from './PassengerInfo';

class PassengersInfo extends React.Component{

    constructor(props){
        super(props);
      
        this.adult  =   localStorage.getItem('international_adult',0);
        this.child  =   localStorage.getItem('international_child',0);
        this.infant =   localStorage.getItem('international_infant',0);
        this.passengers = [];

    }

    filedMaker=(count,title)=>{
        for (let index = 0; index < count; index++) {
            this.passengers.push(<PassengerInfo title={title} />);
           
       }
    }
    

    render(){
        
            this.filedMaker(this.adult,'بزرگسال');
            this.filedMaker(this.child,'کودک');
            this.filedMaker(this.infant,'نوزاد');
        
            
            return(
                this.passengers
            );
        }
        
    }

if(document.querySelector('#PassengerInfo')){

    ReactDOM.render(<PassengersInfo/> , document.querySelector('#PassengerInfo'));
}