"use strict";

//Constructor for the recommender object
export class Recommender {
    //Holds the keywords
    keywords = {};
    viewings = {};

    //Keywords older than this window will be deleted
    timeWindow = 604800000;

    constructor(){
        this.loadKeywords();
        this.loadViewings();
    }

    //Adds a keyword to the reommender
    addKeyword(word){
        //Increase count of keyword
        if(this.keywords[word] === undefined && word !== "")
            this.keywords[word] = {count: 1, date: new Date().getTime()};
        else{
            this.keywords[word].count++;
            this.keywords[word].date = new Date().getTime();
        }
        
        console.log(JSON.stringify(this.keywords));
        
        //Save state of recommender
        this.saveKeyword();
    }

    addViewing(id){
        //Increase count of keyword
        if(this.viewings[id] === undefined)
            this.viewings[id] = {count: 1, date: new Date().getTime()};
        else{
            this.viewings[id].count++;
            this.viewings[id].date = new Date().getTime();
        }
        
        console.log(JSON.stringify(this.viewings));
        
        //Save state of recommender
        this.saveViewing();
    }

    //Returns the most popular keyword
    getTopKeyword(){
        //Clean up old keywords
        this.deleteOldKeywords();
        
        //Return word with highest count
        let maxCount = 0;
        let maxKeyword = "";
        for(let word in this.keywords){
            if(this.keywords[word].count > maxCount){
                maxCount = this.keywords[word].count;
                maxKeyword = word;
            }
        }
        return maxKeyword;
    }

    getTopViewing(){
        //Clean up old keywords
        this.deleteOldViewings();
        
        //Return id of the product with highest count
        let maxCount = 0;
        let maxViewing = "";
        let secondMaxViewing = "";
        for(let id in this.viewings){
            if(this.viewings[id].count > maxCount){
                maxCount = this.viewings[id].count;
                secondMaxViewing = maxViewing;
                maxViewing = id;
            }
        }
        return maxViewing, secondMaxViewing;
    }

    /* Saves state of recommender */
    saveKeyword(){
        localStorage.recommenderKeywords = JSON.stringify(this.keywords);
    };

    saveViewing(){
        localStorage.recommenderViewings = JSON.stringify(this.viewings);
    };

    /* Loads tracking data from local storage */
    loadKeywords(){
        if(localStorage.recommenderKeywords === undefined)
            this.keywords = {};
        else
            this.keywords = JSON.parse(localStorage.recommenderKeywords);
        
        //Clean up keywords by deleting old ones
        this.deleteOldKeywords();
    };

    loadViewings(){
        if(localStorage.recommenderViewings === undefined)
            this.viewings = {};
        else{
            this.viewings = JSON.parse(localStorage.recommenderViewings);
    }
        //Clean up viewings by deleting old ones
        this.deleteOldViewings();
    };
    
    //Removes tracking data that are older than the time window
    deleteOldKeywords(){
        let currentTimeMillis = new Date().getTime();
        for(let word in this.keywords){
            if(currentTimeMillis - this.keywords[word].date > this.timeWindow){
                delete this.keywords[word];
            }
        }
        this.saveKeyword();
    }

    deleteOldViewings(){
        let currentTimeMillis = new Date().getTime();
        for(let id in this.viewings){
            if(currentTimeMillis - this.viewings[id].date > this.timeWindow){
                delete this.viewings[id];
            }
        }
        this.saveViewing();
    }

}

