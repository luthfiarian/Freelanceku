/** @type {import('tailwindcss').Config} */
module.exports = {
  
  content: ["App/Views/**.php", "App/Views/templates/**.php", "App/Views/Templates/Part/**.php",
            "App/Views/Error/**.php",
            "App/Views/Client/**.php","App/Views/Client/Templates/**.php", "App/Views/Client/Templates/Part/**.php",
            "App/Views/Admin/**.php", "App/Views/Admin/Templates/**.php", "App/Views/Admin/Templates/Part/**.php",
            // Flowbite
            "./node_modules/flowbite/**/*.js"
            ],
  theme: {
    container:{
      center: true,
      padding: '16px'
    },
    extend: {
      colors:{
        'primary'   : "white",
        'secondary' : "#EAAB66",
        'third'     : "#B1824F",
        'forth'     : "#5F4120"
      },
      screens:{
        '2xl': '1320px'
      }
    },
  },
  plugins: [ require('flowbite/plugin') ], 
}

