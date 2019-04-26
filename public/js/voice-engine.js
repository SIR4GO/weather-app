

export class VoiceEngine{
   
    static activeVoiceCommandsProcess()
    {
                    
            window.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
            const recognition = new SpeechRecognition();
            recognition.continuous = true;
            recognition.interimResults = true;
            recognition.lang = 'en-US';


           // helper variable for engines
            var targeElement = null;
            var targeElementBorderStyle = "";
            var targeElementFocusBorderStyle = '2px dotted #4285F4';
            var numberOfExecuteCommandAtOneVoice = 1;



            recognition.addEventListener('result', event => {
                
                var current = event.resultIndex;
                console.log(event.results);
                console.log(current);

            
                const transcript = event.results[current][0].transcript.toLowerCase();  // get transcript attribute from current  recognize object from array of recongiztion objects 
                                                                                        // recognize object represent  one sentence after stoping on speaking
                    
                    // should be here to updated by new observer elements
                    var tempList = JSON.parse(localStorage.getItem('actionList'));
                  
                    // search engine
                    tempList.forEach(function(action){
                        var result = action.voiceCommand.trim().toLowerCase().match(transcript.trim());

                        if(result != null && result[0].length >= 3 )
                        {
                            console.log('regx here');
                            console.log(result[0]);

                            // delete border from current target element and return his border style after focus
                            if(targeElement != null)
                                document.getElementById(targeElement.id).style.border=targeElementBorderStyle;

                            // overwrite by new element
                            targeElement = action; 
                            var htmlNode = document.getElementById(targeElement.id);
                            console.log(htmlNode);                            
                            targeElementBorderStyle = htmlNode.style.border; // to keeb last border style of elemnt if element no target now
                            htmlNode.style.border=targeElementFocusBorderStyle;

                            
                             
                        }
                        else if ( transcript.trim() === action.voiceCommand.trim().toLowerCase())
                        {
                             console.log('equality here');
                             
                            // delete border from current target element
                            if(targeElement != null)
                                document.getElementById(targeElement.id).style.border=targeElementBorderStyle;

                            // overwrite by new element
                             targeElement = action; 
                             var htmlNode = document.getElementById(targeElement.id);
                             console.log(htmlNode);
                             targeElementBorderStyle = htmlNode.style.border;
                             htmlNode.style.border='2px dotted #4285F4';
                              
                        }
                    });

                    // end search engine

           
                      // start command engine

                       // uitility command engine not need target element
                        if(transcript.includes('refresh')){
                           console.log('refresh command to improve performance ');
                           recognition.stop();
                        }

                        if(targeElement != null && targeElement.type === 'INPUT')
                        {
                            var textInput = document.getElementById(targeElement.id);
                            if(textInput.type === "text") 
                                textInput.value = transcript.trim().toLowerCase();
                        }

                        // below if executed more times each one voice duo to  recognition.interimResults = true;  
                        if(targeElement != null && numberOfExecuteCommandAtOneVoice === 1)// to avoid execute commands more time  
                         {
                            // commands 
                             if(transcript.includes('red')){
                                document.getElementById(targeElement.id).style.backgroundColor='red';
                                ++numberOfExecuteCommandAtOneVoice; 
                                 
                             }
                               
                             if(transcript.includes('blue')){
                                document.getElementById(targeElement.id).style.backgroundColor='blue'; 
                                ++numberOfExecuteCommandAtOneVoice;  

                             }
                             if(transcript.includes('green')){
                                document.getElementById(targeElement.id).style.backgroundColor='green';      
                                ++numberOfExecuteCommandAtOneVoice;  

                             }
                             if(transcript.includes('go')){
                                document.getElementById(targeElement.id).click();    
                                ++numberOfExecuteCommandAtOneVoice;  

                             }
                            
                             
                          
                         }

                                                                                            

                if (event.results[current].isFinal) {

                    // engine logic called here
                    numberOfExecuteCommandAtOneVoice = 1; // reset number of commands each final voice 
                    console.log(transcript);
                  
                     
                }



            });

            //recognition.addEventListener('end', recognition.start);

            recognition.start();

            var error = false;
            recognition.onerror = function(event) {
               
              
                console.log( 'Error occurred in recognition: ' + event.error);
               
                 if(event.error.trim() === "not-allowed")
                      error = true;
                  

            }
            
            recognition.onend = function(event) {
                //Fired when the speech recognition service has disconnected.
                if(! error)
                   recognition.start();
                else
                {
                   recognition.stop(); 
                   console.log('voice end duo to not allowed error page blocked microphone ..... ');

                }
                console.log('SpeechRecognition.onend');
                console.log('start again ..... ');
            }
    }



}