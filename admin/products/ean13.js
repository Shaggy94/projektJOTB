
  var lefthandodd = ["0001101", "0011001", "0010011", "0111101", "0100011", "0110001", "0101111", "0111011", "0110111", "0001011"];
var lefthandeven = ["0100111", "0110011", "0110011", "0100001", "0011101", "0111001", "0000101", "0010001", "0001001", "0010111"];
var righthand = ["1110010", "1100110", "1101100", "1000010", "1011100", "1001110", "1010000", "1000100", "1001000", "1110100"];
var barcode = document.getElementById("ean13").value;
console.log(barcode);
var i;
var sum;
var checksum = 0;
for(i = 0; i<barcode.length-1; i++)
{
	if(i % 2 == 0)
	{
		sum = Number(barcode[i])*1;
		checksum = sum + checksum;
		}
	else
	{
		sum = Number(barcode[i])*3;
		checksum = sum + checksum;
		}
}
checksum = 10-(checksum % 10);

var realbarcode = ["101", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "101"];
var parity = [1, 0, 0, 1, 1, 0];
var j = 0;
for(i = 1; i<7; i++)
{
	if(parity[j] == 0)
		{
			realbarcode[i] = lefthandeven[Number(barcode[i])];
		}
	else
		{
			realbarcode[i] = lefthandodd[Number(barcode[i])];
		}
	j++;
}
realbarcode[7] = "01010";
j = 7;
for(i = 8; i<14; i++)
{
	realbarcode[i] = righthand[Number(barcode[j])];
	j++;
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
			if(i == 0 || i == 7 || i == 14)
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
