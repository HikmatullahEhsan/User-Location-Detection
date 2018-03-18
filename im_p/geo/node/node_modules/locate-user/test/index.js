'use strict';

const chai = require('chai').should();
const locateUser = require('../');

const ip = '1.1.1.1';
const mockReq = {
    headers: {},
    client: { remoteAddress: ip }
};

const keys = ['ip', 'country_code', 'country_name', 'region_code', 'region_name', 'city', 'zip_code', 'time_zone', 'latitude', 'longitude', 'metro_code'];

const expected = {
    ip: '1.1.1.1',
    country_code: 'AU',
    country_name: 'Australia',
    region_code: 'VIC',
    region_name: 'Victoria',
    city: 'Research',
    zip_code: '3095',
    time_zone: 'Australia/Melbourne',
    latitude: -37.7,
    longitude: 145.1833,
    metro_code: 0
};



describe('Locate User', () => {


    it('should Successfully return users location as json', done => {
        locateUser(mockReq)
            .then(data => {
                data.should.have.all.keys(keys);
                keys.forEach(key => data.should.have.property(key, expected[key]));
                done();
            })
            .catch(done);
    })

})