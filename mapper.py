import sys
import cv2
import numpy as np

path = sys.argv[1]

if len(sys.argv) == 3 :
	max_area = int(sys.argv[2])
else:
	max_area = 5
img = cv2.imread(path)
#img = cv2.imread('/home/manujith/Desktop/map2.png')


#convert to grey scale
img_grey = cv2.cvtColor( img, cv2.COLOR_BGR2GRAY )
#cv2.imshow('im1',img_grey)

#convert to binary based on OTSU threshold, it turns out that the BINARY INVERSION works the best
ret,thresh = cv2.threshold(img_grey,127,255,cv2.THRESH_BINARY_INV | cv2.THRESH_OTSU)
#cv2.imshow('image',thresh)

#find contours on it
contours, hierarchy = cv2.findContours(thresh,cv2.RETR_CCOMP,cv2.CHAIN_APPROX_NONE)

h,w,d = img.shape
marea = h*w*max_area/100

for i in xrange(len(contours)):
	ca = cv2.contourArea(contours[i])
	if ca > marea:
		continue
	
	print '<area shape="poly" coords="'
	for j in xrange(len(contours[i])):
		print "%d,%d," % (contours[i][j][0][0],contours[i][j][0][1]),
	print '" href="#" title="%s" />' % i
	

#print len(contours)

#cv2.drawContours(img_grey,contours,-1,(0,255,0),2)

#cv2.imshow('image 2',img_grey)
#cv2.waitKey(0)
