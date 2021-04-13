// Write a JavaScript function to get the first element of an array. 
// Passing a parameter 'n' will return the first 'n' elements of the array

// Write a JavaScript function to get the last element of an array. 
// Passing a parameter 'n' will return the last 'n' elements of the array

const sampleArray = [2,3,4,5,6,7]

const first_or_first_n = function(theArray, n){
    // get first n elements of the array
    if(n > 0 && n <= theArray.length) {
        let resArray = []

        for(let i = 0; i < n; i++){
            resArray.push(theArray[i])
        }

        return resArray;
    }
    // return the first element of the array
    n = 0
    return [theArray[n]];
}

console.log(first_or_first_n(sampleArray, 3))

const last_or_last_n = function(theArray, n){
    if(n > 0 && n <= theArray.length){
        return theArray.slice(-n)
    }
    //return last element of the array
    n = theArray.length - 1
    return [theArray[n]]
}

console.log(last_or_last_n(sampleArray, 2))