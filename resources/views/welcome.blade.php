<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
 
    <div class="relative" id="app">
        <div aria-hidden="true" class="absolute inset-0 grid grid-cols-2 -space-x-52 opacity-40 ">
            <div class="blur-[106px] h-56 bg-gradient-to-br from-primary to-purple-400 "></div>
            <div class="blur-[106px] h-32 bg-gradient-to-r from-cyan-400 to-sky-300 "></div>
        </div>
  
            <div class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6">
           
           
            <div class="relative pt-36 ml-auto">
                <div class="lg:w-2/3 text-center mx-auto">
                    <h1 class="text-gray-900  font-bold text-5xl md:text-6xl xl:text-7xl">Where do you want to go with <span class="text-primary ">Guydeez.</span></h1>
                    <p class="mt-8 text-gray-700 ">
                        Guydeew offers you private and presonalized tours with a local guide abroad
                    </p>

                    <div class=" w-full pt-11 relative">
                        <input v-model='query' id="queryInput" type="text" class=" w-full h-14 outline-none rounded-l-md rounded-r-full border p-4" placeholder="Where are you going ?">
                        <button
                        class=" absolute top-[3.1rem] right-2  flex h-11 w-full items-center justify-center px-6 before:absolute before:inset-0 before:rounded-full before:bg-primary before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max"
                      >
                        <span class="relative text-base font-semibold text-white"
                          >Search</span
                        >
                      </button>

                     
                      <div v-if="results.length > 0" class=" w-full bg-white shadow rounded-xl absolute top-28 border left-0 max-h-96 overflow-y-auto flex flex-col items-start space-y-4 p-5">
                        <div v-for="(item,index,key) in results" :key="key" class=" w-full flex items-center space-x-4 hover:bg-primary group p-4 rounded-xl cursor-pointer border">
                            <div class=" w-10 h-10 rounded-full border bg-white flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 m-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                  </svg>
                                  
                            </div>

                            <div class=" flex flex-col items-start space-y-2">
                                <span class=" text-black text-xl font-bold">@{{item.name}}</span>
                                <span class=" text-sm font-medium text-primary group-hover:text-white">@{{item.country}}</span>
                            </div>
                        </div>
                      </div>
                    </div>
                
                   
                </div>
             
            </div>
        </div>
    </div>

    <script>
      $(document).ready(function () {
          new Vue({
              el: '#app',
              data: {
                  query: '',
                  results: [],
              },
              watch: {
                  query: function(newQuery) {
                      if (newQuery.length >= 1) {
                          this.search();
                      } else {
                          this.results = [];
                      }
                  }
              },
              methods: {
                  search: function() {
                      let self = this;
  
                      $.ajax({
                          url: '/search', 
                          method: 'GET',
                          data: { query: this.query },
                          success: function (data) {
                              self.results = data;
                          }
                      });
                  },
                 
              }
          });
      });
  </script>
</body>
</html>