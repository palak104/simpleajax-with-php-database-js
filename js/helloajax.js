

window.addEventListener("load", function() {

    /**
     * Gets a user object and converts it to HTML for inclusion on the page.
     * @param {User} user 
     */
    function userToHtml(student) {
        let html = "<div>";
        html += "<h3>" + student.fullname + "(" +student.grade +")</h3>";
        html += "</div>";
        return html;
    }

    // function for sound play
    function sound(src) {
        this.sound = document.createElement("audio");
        this.sound.src = src;
        this.sound.setAttribute("preload", "auto");
        this.sound.setAttribute("controls", "none");
        this.sound.style.display = "none";
        document.body.appendChild(this.sound);
        this.play = function(){
        this.sound.play();
      }
    } 
   
     
      let mySound = new sound("goback.mp3");
     

         
    /**
     * This function should be called when the AJAX call is complete
     * and the json-encoded array has been extracted from the response.
     * @param {Array} users
     */
    // to add student
    function add(stud){
        let std = "";
       
        for (let i = 0; i < stud.length; i++) {
            std += userToHtml(stud[i]);

        }
       
        // output the students
        document.getElementById("target").innerHTML = std;
         
    }
    // to display list of students using ajax call
    function success(students) {
        // build an html string and compute the average grade
        let std = "";
       
        for (let i = 0; i < students.length; i++) {
            std += userToHtml(students[i]);
           

        }
       
        // output the students
        document.getElementById("target").innerHTML = std;

        console.log(std); // debug
    }

    
    const form = document.querySelector('form');
  

    form.addEventListener("submit", function() {
        mySound.play();
       
        // ajax call for insert.php
        let name = document.getElementsById("name").value
        let grade = document.getElementsById("grade").value;

        let param = name  + grade;
        console.log(param);

        // construct the url (try both)
        let url = "insert.php";
        

        console.log(url); // debug

        // do the fetch
        fetch(url, { 
            method: 'POST',
            credentials: 'include' ,
            headers: {"Content-Type":"application/x-www-form-urlencoded"},
            body:param
        })
            .then(response => response.text())
            .then(add)
            
    });
   

    //ajax call for display all student record

    let url = "select.php";
       

        console.log(url); // debug

        // do the fetch
        fetch(url, { credentials: 'include' })
            .then(response => response.json())
            .then(success)
     
        });

    
  
