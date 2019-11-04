import './MultiSelect.css'
class MultiSelect extends React.Component{
        
    render(){
        return(
            <React.Fragment>
                 <input type="text" id={this.props.name +'_myInput'} onKeyUp={Search} className={this.props.className} placeholder={this.props.Placeholder} autocomplete="off" />
 
                 <input type="hidden"  name={this.props.name} id={this.props.prefix +'_'+this.props.name} value={this.props.name} />
 
                 <ul id="myUL"  style={{display:'block'}} className="myUL ui-menu ui-widget ui-widget-content ui-autocomplete ui-front" onClick={()=>getValue()}>
                     {this.props.children}
                     <li className="ui-menu-item">
                         <a className="airports ui-menu-item-wrapper" id="ika">
                             <span>IKA</span>-Imam Khomeini International AirPort فرودگاه بین&zwnj;المللی امام خمینی - تهران - Iran
                         </a>
                     </li>
                    
                 </ul>
            </React.Fragment> 
         ); 
 
    }//render
        
        // ############################################## جستجوی عبارت وارد شده ############################
         Search() {
            // Declare variables
            var input, filter, ul, li, a, i, txtValue;

            input   =    document.getElementById(this.props.name +'_myInput');
            // input.value="";
            filter  =    input.value.toUpperCase();
            ul      =    document.getElementById("myUL");

            ul.style.display = "block";
            li      =    ul.getElementsByTagName('li');
        
            // Loop through all list items, and hide those who don't match the search query
            let liLength = li.length;
            let hidenLiCount=1;

            for (i = 0; i < li.length; i++) {
                hidenLiCount= $('#myUL li').filter(function() {
                    return $(this).css('display') == 'none';
                }).length
                //################## اگر لیست خالی شد از دیتابیس بخونه #########################
                if(liLength - hidenLiCount<=0){
                    let term = document.getElementById(this.props.name +'_myInput').value;
                    let child='';
                    if(term.length >= 3){
                        axios.post('/airports', {
                            q:term 
                          })
                          .then(function (response) {
                            //   console.log(response.data)
                            response.data.map((airport)=>{
                               child =`<li class="ui-menu-item">
                                            <a class="airports ui-menu-item-wrapper" id="${airport.iata}">
                                                <span>${airport.iata}</span>-${airport.name} - ${airport.farsi} - ${airport.city}
                                            </a>
                                        </li>`
                               $("#myUL").append(child);
                            
                            })
                            
                          })
                          .catch(function (error) {
                            console.log(error);
                          });
                    }
                    

                }

                
                a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;

                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                    
                } else {
                    li[i].style.display = "none";                    
                }
            }//for
        }//Search
        // ###################################################################################################
         getEventTarget(e)
        {
            e = e || window.event;
            return e.target || e.srcElement; 
        }
        //############ when click <li> tag #########################
         getValue(event){
            var target = getEventTarget(event);
            // alert(target.innerText);
            document.getElementById(this.props.name +'_myInput').value=target.innerText;
            // console.log(target.getAttribute('id'));
            document.getElementById("myUL").style.display="none";
            // alert(this.props.prefix +'_'+this.props.name);
            console.log(props);
            document.getElementById(this.props.prefix +'_'+this.props.name).value=target.getAttribute('id');
        };
}//component function 

    
export default MultiSelect;