import PassengerInfo from './PassengerInfo';

class PassengersInfo extends React.Component{

    constructor(props){
        super(props);
      
        this.adult  =   localStorage.getItem('adult',0);
        this.child  =   localStorage.getItem('child',0);
        this.infant =   localStorage.getItem('infant',0);
        this.passengers = [];

    }

    // passengerType adt=1,chd=2,inf=3 
    filedMaker=(count,title,passengerType)=>{
        for (let index = 0; index < count; index++) {
            this.passengers.push(<PassengerInfo title={title} passengerType={passengerType} key={index}/>);
           
       }
    }
    

    render(){
        
            this.filedMaker(this.adult,'بزرگسال',1);
            this.filedMaker(this.child,'کودک',2);
            this.filedMaker(this.infant,'نوزاد',3);
        
            
            return(
                this.passengers
            );
        }
        
    }

if(document.querySelector('#PassengerInfo')){

    ReactDOM.render(<PassengersInfo/> , document.querySelector('#PassengerInfo'));
}