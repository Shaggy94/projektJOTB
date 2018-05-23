var lefthandodd = ["0001101", "0011001", "0010011", "0111101", "0100011", "0110001", "0101111", "0111011", "0110111", "0001011"];
var righthand = ["1110010", "1100110", "1101100", "1000010", "1011100", "1001110", "1010000", "1000100", "1001000", "1110100"];
//var barcode = document.getElementById("ean13").value;
//console.log(barcode);
var barcode = data;
var i;

var realbarcode = ["101", "0", "0", "0", "0", "01010", "0", "0", "0", "0", "101"];
for(i = 1; i<5; i++)
{
	realbarcode[i] = lefthandodd[Number(barcode[i-1])];
}
for(i = 6; i<10; i++)
{
	realbarcode[i] = righthand[Number(barcode[i-2])];
}
var canvas = document.getElementById("myCanvas");
var ctx = canvas.getContext("2d");
ctx.fillStyle = "#000000";
var x = 0;
for(i = 0; i<realbarcode.length; i++)
{
	for(j = 0; j<realbarcode[i].length; j++)
	{
		if(realbarcode[i][j] == 1)
		{
			if(i == 0 || i == 5 || i == 10)
			{
				ctx.fillRect(x,0,2,85);
				x += 2;
			}
			else
			{
				ctx.fillRect(x,0,2,75);
				x += 2;
			}
		}
		else
		{
			x += 2;
		}
	}
}
