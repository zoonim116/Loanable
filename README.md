# Loanable

Loanable is a Wordpress theme based on [Sage](https://github.com/roots/sage)

## Getting Started

These instructions will give you a copy of the project up and running on
your local machine for development and testing purposes. See deployment
for notes on deploying the project on a live system.

### Prerequisites

Requirements for the software and other tools to build, test and push 
- Installed and running local instance of Wordpress 
- [Git](https://git-scm.com/)
- [Node](https://nodejs.org/en/download)

### Installing

Navigate to Wordpress theme folder, create a new theme folder and clone git repository to a newly created folder.

    cd ./wp-content/themes
    mkdir loanable && cd loanable
    git clone https://github.com/zoonim116/Loanable .

Install node modules

    npm -i
    
To build assets in development mode use:
		
    npm run dev
    
**Note!!!** Sometimes it can cause CORS errors. In this case add .env file in root of the theme and add APP_URL to file.

    cd ./wp-content/themes/loanable
    touch .env
    echo "APP_URL=https://my-app.local" >> .env
**Please do not forget to replace  https://my-app.local to your local domain**


To build production ready assets use:
		
    npm run build


## Deployment

This section is in progress
