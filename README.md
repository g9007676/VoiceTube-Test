# VoiceTube-Test

* get all to-do lists   
  Url: GET http://voicetube-test.localhost/items   
  header:Authorization:Bearer {token}  

* get one to-do list    
  Url: GET http://voicetube-test.localhost/items/{items_id}   
  header:Authorization:Bearer {token}    

* create one to-do list   
  Url: POST http://voicetube-test.localhost/items/   
  parems:title, content    
  header:Authorization:Bearer {token}    

* update one to-do list    
  Url: PUT http://voicetube-test.localhost/items/{items_id}    
  parems:title, content   
  header:Authorization:Bearer {token}    

* delete one to-do list    
  Url: DELETE http://voicetube-test.localhost/items/{items_id}     
  header:Authorization:Bearer {token}    

* delete all to-do list    
  Url: DELETE http://voicetube-test.localhost/items/clear    
  header:Authorization:Bearer {token}    

* generate a new token    
  Url: GET http://voicetube-test.localhost/token/refresh     
  header:Authorization:Bearer {old_token}    

* register user  
  Url: POST http://voicetube-test.localhost/signup    
  parems:email, name, password    

* get token status (Only if tokens with TTL or RefreshToken)   
  Url: GET http://voicetube-test.localhost/token    
  header:Authorization:Bearer {token}    
