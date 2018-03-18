'use strict';

const https = require('https');
const getUserIP = require('user-ip');

/*
 * This Npm Uses Free Geo IP 's (freegeoip.net) service to provide users location 
 */

function getLocation(req, options) {

    return new Promise((resolve, reject) => {

        if (!req) {
            const error = new Error('Request Object Should Not Be Null Or Undefined');
            reject(error);
        }

        const userIP = getUserIP(req);
        const url = `https://freegeoip.net/json/${userIP}`;

        if (userIP) {
            https.get(url, resStream => {
                let data = '';
                resStream.setEncoding('utf8');
                resStream.on('data', chunk => data += chunk);
                resStream.on('error', reject);
                resStream.on('end', () => {
                    try {
                        const body = JSON.parse(data);
                        resolve(body);
                    } catch (error) {
                        reject(error);
                    }
                });

            })
        }

    })
}

module.exports = getLocation;
