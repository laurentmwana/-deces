const toggles = document.querySelectorAll("[toggle-element]") 
const visibled = document.querySelectorAll("[visibled]") 
const tables = document.querySelectorAll("[table-responsive]")
const dropdowns = document.querySelectorAll("[dropdown]")
const inputs = document.querySelectorAll("[input]")
const password = document.querySelector("[password]")
const eye = document.querySelector(".eye")
const reveals = document.querySelectorAll(".reveal")
const flashMessage = document.querySelector("#flash-message")

if (visibled !== null && toggles !== null) {
    toggles.forEach(function (element) {
        element.addEventListener("click", function (e) {
            e.preventDefault()
            attributeElement = element.getAttribute("toggle-element")
            element.classList.toggle("active")
    
            if (element.classList.contains("active")) {
                visibled.forEach((v) => {
                    attributeVisibled = v.getAttribute("visibled")
                    if (attributeVisibled === attributeElement) {
                        v.classList.add("visibled")
                    }
                })
            } 
    
            else {
                visibled.forEach((v) => {
                    attributeVisibled = v.getAttribute("visibled")
                    if (attributeVisibled === attributeElement) {
                        v.classList.remove("visibled")
                    }
                })
            }
        })
    })
}

if (tables !== null && tables !== undefined) {
    tables.forEach((table) => {
        tableLabel = []
       table.querySelectorAll("th").forEach((th) => {
            tableLabel.push(th.innerText)
       })

       table.querySelectorAll("td").forEach((td, index) => {
            td.setAttribute("table-label", tableLabel[index % tableLabel.length]);
       })

    })
}

if (dropdowns !== null && dropdowns !== undefined) {
    dropdowns.forEach((dropdown) => {
        dropdown.addEventListener("click", function (e) {
            e.preventDefault()
            dropdown.classList.toggle("active")
            if (dropdown.classList.contains("active")) {
                dropdown.querySelectorAll("[option]").forEach(option => {
                    option.addEventListener("click", function (e) {
                        e.preventDefault()
                        var content = option.innerText
                        const field = dropdown.querySelector("[dropdown-field]")
                        field.setAttribute("readonly", "readonly")
                        field.value = content
                    })
                });
            }
        })
    })
}

if (inputs !== null && inputs !== undefined) {
    inputs.forEach((input) => {
        input.addEventListener("focus", function (e) {
            e.preventDefault()
            this.parentNode.classList.toggle("active")
        })

        input.addEventListener("blur", function (e) {
            e.preventDefault()
            this.parentNode.classList.remove("active")

        })
    })

}

if (eye !== null) {  
    eye.addEventListener("click", function() {
        if(password.type === "text") {
            console.log(password);
            password.type = "password"
            eye.innerHTML = '<i class="fa fa-eye-slash icon-field primary " password-eye></i>'
        }

        else {
            password.type = "text"
            eye.innerHTML = '<i class="fa fa-eye icon-field primary " password-eye></i>'
        }


    })
}

if (reveals !== null) {

    window.addEventListener("scroll", function () {
        reveals.forEach((reveal) => {
            var windowHeight = window.innerHeight
            var revealTop = reveal.getBoundingClientRect().top
            var revealPoint = 150

            if (revealTop < windowHeight - revealPoint) {
                reveal.classList.add("active")
            }

            else {
                reveal.classList.remove("active")
            }
        })
    })
   
}

if (flashMessage !== null) {

    var times = 1000

    setInterval(function() {
        flashMessage.classList.add("active")
    }, times / 4)

    setInterval(function() {
        flashMessage.style.display = "none"
    }, times * 7)

    

     
}





