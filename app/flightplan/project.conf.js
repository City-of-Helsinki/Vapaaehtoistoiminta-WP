/**
 * Project specific settings for flightplan.
 */

var config = {

    //relative web root to this local build
    webRoot: '/dist',

    targets: {

        local: {},

        staging: {
            hosts: {
                host: 'staging.em87.io',
                username: 'evermadeweb',
                privateKey: '',
                passphrase: process.env.EVERMADEWEB_PASSPHRASE,
                agentForward: true,
                agent: process.env.SSH_AUTH_SOCK
            },
            options: {
                buildRoot: '/srv/www/vapaaehtoisalusta.em87.io', // No trailing slash
                webRoot: '/dist', //relative from build root
                url: 'http://vapaaehtoisalusta.em87.io', // No trailing slash
                dbPush: true,
                log: true
            }
        },

        production: {
            hosts: {
                host: '94.237.13.235',
                username: 'evermade',
                privateKey: '',
                passphrase: process.env.EVERMADEWEB_PASSPHRASE,
                agentForward: true,
                agent: process.env.SSH_AUTH_SOCK
            },
            options: {
                buildRoot: '/srv/www/vapaaehtoistoiminta.hel.fi', // No trailing slash
                webRoot: '/dist', //relative from build root
                url: 'http://vapaaehtoistoiminta.hel.fi', // No trailing slash
                dbPush: false,
                log: false
            }
        }

    }

};

module.exports = config;
