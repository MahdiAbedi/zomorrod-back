import OutLineTicket from '../SearchPanel/OutLineTicket'

function ChangeOutlineTicket(){
    return (<OutLineTicket/>)
    
}
if(document.querySelector('#international_search')){

    ReactDOM.render(<ChangeOutlineTicket/>,document.getElementById('international_search'));
}