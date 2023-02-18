class Supply{
    constructor(gecko = null, name = null){
        if (gecko !== null) {
            this.circulating = gecko.circulatingSupply;
            this.total = gecko.totalSupply;
            this.max = gecko.maxSupply;
        }

    }

    getSupply(){
        return this;
    }

    setSupply(supply){
        // this.supply = supply;
    }
}
