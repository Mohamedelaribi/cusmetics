var submit = document.getElementById('submit')
var nom = document.getElementById("nom");
var prix = document.getElementById("prix");
var date = document.getElementById("date");
var marque = document.getElementById("marque");
var Type = document.getElementById('Type')
var radioPromotion1 = document.getElementById('radioPromotion1')
var radioPromotion2 = document.getElementById('radioPromotion2')
var resultat = document.getElementById('cate');

var mood ='create'
var index
var tbody = document.getElementById("tbody");
var product = [];



function valider(){
    
        // nom validation
        if(nom.value.length>30||nom.value ==''){
          nom.nextElementSibling.innerHTML="entre un nom moins de 30 letre"
          nom.nextElementSibling.style.color="red"
          nomValidate = false
        }
        else{
            nom.nextElementSibling.innerHTML='valide'
            nom.nextElementSibling.style.color = 'green'
            nomValidate = true
        }

        // marque validation
        if (marque.value == ""){
          marque.nextElementSibling.innerHTML = "choisir un marque";
          marque.nextElementSibling.style.color="red"
          marqueVlidate=false;
        }   
        else{
        marque.nextElementSibling.innerHTML='valide'
        marque.nextElementSibling.style.color='green'
        marqueVlidate=true;
    }

        //price validation
        var reg_price = /^[0-9]{1,4}$/g;

        if(reg_price.test(prix.value)){
          prix.nextElementSibling.innerHTML="valide"
          prix.nextElementSibling.style.color="green"
          priceValidate = true
        }
        else{
          prix.nextElementSibling.innerHTML="no valid "
          prix.nextElementSibling.style.color="red"
          priceValidate = false
        }

        //  date validation

        if(date.value == ''){
            date.nextElementSibling.innerHTML = "choisir un date"
            date.nextElementSibling.style.color="red"
            dateValidate = false
        }
        else{
            date.nextElementSibling.innerHTML = "valide"
            date.nextElementSibling.style.color ="green"
            dateValidate = true
        }

        //type validation 

        if(Type.value ==''){
            Type.nextElementSibling.innerHTML = "choisir un type"
            Type.nextElementSibling.style.color = 'red'
            typeValidete = false
        }
        else{
            Type.nextElementSibling.innerHTML = 'valide'
            Type.nextElementSibling.style.color = 'green'
            typeValidete = true
        }


        //promo validation

        if(radioPromotion1.checked==true){
            resultat.innerHTML=radioPromotion1.value
            promotion = radioPromotion1.value
            resultat.style.color = 'green'
            promoValidate = true
        }
        else if(radioPromotion2.checked==true){
            resultat.innerHTML = radioPromotion2.value
            promotion = radioPromotion2.value
            resultat.style.color = 'green'
            promoValidate = true
        }
        else{
            resultat.innerHTML = "select promotion"
            resultat.style.color = 'red'
            promoValidate  = false
        }


        if(nomValidate == false || marqueVlidate == false || priceValidate == false || dateValidate == false || typeValidete == false || promoValidate ==false){
            alert("un information n'est pas nalide")
        }
        else{
            addToTable()
            clear()
        }
    }

        function addToTable(){
            var newProduit = {
             nom: nom.value,
             marque: marque.value,
             prix: prix.value,
             Type: Type.value,
             date: date.value,
             Promo: promotion,
         }
         if(mood === 'create'){
            product.push(newProduit)
            console.log(product)
        }
        else{
        product[index]  =  newProduit;
         mood = 'create';
         submit.innerHTML = 'Create';
     }


        tbody.innerHTML = "";

        for (let i=0 ; i < product.length ; i++){
            var tr=document.createElement("tr");
                    tr.innerHTML=`
                    <td>${product[i].nom}</td>
                    <td>${product[i].marque}</td>
                    <td>${product[i].prix}</td>
                    <td>${product[i].date}</td>
                    <td>${product[i].Type}</td>
                    <td>${product[i].Promo}</td>
                    <td><button  style="background-color:  #b397ba; margin: 20px 0px; "   onclick='UpdateData(${i})' id="update">Update</button></td>
                    <td><button style="background-color:  #b397ba;  margin: 20px 0px;"  onclick="deleteData(${i})" id="deletee">delete</button></td>
                    `;
                            
                    tbody.appendChild(tr)
        }
        
        }
                function clear(){
            nom.value = '';
            marque.value = '';
            prix.value = '';
            Type.value = '';
            date.value = '';
            promotion.value = '';
            
        }
                function UpdateData(i) {
            nom.value = product[i].nom;
            marque.value = product[i].marque;
            prix.value = product[i].prix;
            Type.value = product[i].Type;
            date.value = product[i].date;
            promotion.value = product[i].Promo;
            submit.innerHTML= 'Update';
            mood = 'update';
            index = i;
        }

        function deleteData(i){
            product.splice(i,1)
            addToTable()
            
        }

