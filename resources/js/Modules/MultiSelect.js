import React from 'react'
import './MultiSelect.css'

function MultiSelect(props){
        return(
           <React.Fragment>
                <input type="text" id={props.name +'_myInput'} onClick={()=>Search()} onKeyUp={()=>Search()} className={props.className} placeholder={props.Placeholder} autocomplete="off"/>

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
            let counter = li.length;
            let counter1=1;

            for (i = 0; i < li.length; i++) {
                counter1= $('#myUL li').filter(function() {
                    return $(this).css('display') == 'none';
                }).length

                if(counter - counter1==0){
                    alert('alla')
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

    
export default MultiSelect;