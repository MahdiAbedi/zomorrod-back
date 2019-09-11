import React from 'react';
import ReactDOM from 'react-dom';
import InlineTicket from './components/SearchPanel/InlineTicket';
import OutLineTicket from './components/SearchPanel/OutLineTicket';
import HotelTicket from './components/SearchPanel/HotelTicket';
import TourTicket from './components/SearchPanel/TourTicket';
import TrainTicket from './components/SearchPanel/TrainTicket';
import InsuranceTicket from './components/SearchPanel/InsuranceTicket';

class SearchPanel extends React.Component{
    render(){
        return (        
            <div>
                <OutLineTicket      />
                <InlineTicket       />
                <HotelTicket        />
                <TourTicket         />
                <TrainTicket        />
                <InsuranceTicket    />
            </div>
              
                
           
    );
    }
}


ReactDOM.render(<SearchPanel/> , document.querySelector('.SearchPanel'));