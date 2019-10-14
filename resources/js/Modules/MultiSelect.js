import './MultiSelect.css'
function MultiSelect(props){
        return(
           <React.Fragment>
                <input type="text" id={props.name +'_myInput'} onKeyUp={Search} className={props.className} placeholder={props.Placeholder} autocomplete="off"/>

                <input type="hidden"  name={props.name} id={props.prefix +'_'+props.name} />

                <ul id="myUL" style={{display:'none'}} onClick={()=>getValue()}>
                    {props.children}
                    <li ><a id="THR">تهران</a></li>
                    <li ><a id="TBZ">تبریز</a></li>

                </ul>
           </React.Fragment> 
        ); 

        
        function Search() {
            // Declare variables
            var input, filter, ul, li, a, i, txtValue;

            input   =    document.getElementById(props.name +'_myInput');
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
                    let term = document.getElementById(props.name +'_myInput').value;
                    let child='';
                    if(term.length >= 3){
                        axios.post('/airports', {
                            term:term 
                          })
                          .then(function (response) {
                              console.log(response.data)
                            // response.data.map((airport)=>{
                            //    child =`<li><a id="${airport.iata}">${airport.farsi}-${airport.iata}-${airport.city}</a></li>`
                            //    $("#myUL").append(child);
                            // //    console.log(child)
                            // })
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

        function getEventTarget(e)
        {
            e = e || window.event;
            return e.target || e.srcElement; 
        }
        //############ when click <li> tag #########################
        function getValue(event){
            var target = getEventTarget(event);
            // alert(target.innerText);
            document.getElementById(props.name +'_myInput').value=target.innerText;
            // console.log(target.getAttribute('id'));
            document.getElementById("myUL").style.display="none";
            document.getElementById(props.prefix +'_'+props.name).value=target.getAttribute('id');
        };
}//component function 

    
export default React.memo(MultiSelect);