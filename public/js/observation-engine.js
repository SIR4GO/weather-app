

export class ObservationEngine
{


    static activeObservationActionsProcess()
    {
              
        document.addEventListener("click" , function(event){
           
                var actionList = [];
                var targeElement = event.target;
                var action = null;

                if(targeElement.tagName === 'INPUT'){
                     action = {id: targeElement.id , voiceCommand: targeElement.placeholder , classes: targeElement.classList , type: targeElement.tagName , url: window.location.href};
                    
                }
                else // any element otherwise INPUT
                {
                     action = {id: targeElement.id , voiceCommand: targeElement.innerText  , classes: targeElement.classList , type: targeElement.tagName , url: window.location.href};

                }
                
                var tempList = localStorage.getItem('actionList');  // for performance issue .... not read actionList agin for JSON.parse()
                
                if(targeElement.tagName === 'BODY' ){return;}; // to aviod add body element in action List
                    

                if(  tempList  != null )
                {
                    
                        actionList = JSON.parse(tempList); //   here i parse string json object to array of action objects     
                        var addingflag = true;
                        for(var index in actionList)// to check current target element is exist in actionList  
                        {
                            if( JSON.stringify(action) === JSON.stringify(actionList[index]) ){  // JSON.stringify to can compare two object  
                                addingflag = false;
                                break;  
                            }      
                        }

                        if(addingflag){  // if true add new element
                            actionList.push(action);
                            localStorage.setItem('actionList' , JSON.stringify(actionList)); // overide on actionList to add new action
                        }
                        
                }
                else
                { // for first time if actionList not exist in local storage

                        actionList.push(action);
                        localStorage.setItem('actionList' , JSON.stringify(actionList));  
                        // duo to localstorage value assign only by string so we convert acctionList array of action objects
                        // to json object  ,,,,, Note: json object is string     

                }



        });
        


    }

  


}


