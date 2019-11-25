import InlineTicket from '../SearchPanel/InlineTicket'

function ChangeInlineTicket(){
    return (<InlineTicket/>)
    
}
if(document.querySelector('#internal_search')){

    ReactDOM.render(<ChangeInlineTicket/>,document.getElementById('internal_search'));
}